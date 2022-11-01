<?php

declare(strict_types=1);

use DI\ContainerBuilder;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Processor\UidProcessor;
use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;
use Slim\Views\PhpRenderer;

return function (ContainerBuilder $containerBuilder) {
    $container = [];

    $container[LoggerInterface::class] = function (ContainerInterface $c) {
        $settings = $c->get('settings');

        $loggerSettings = $settings['logger'];
        $logger = new Logger($loggerSettings['name']);

        $processor = new UidProcessor();
        $logger->pushProcessor($processor);

        $handler = new StreamHandler($loggerSettings['path'], $loggerSettings['level']);
        $logger->pushHandler($handler);

        return $logger;
    };

    $container[PDO::class] = DI\factory(\Portal\Factories\PDOFactory::class);
    $container[PhpRenderer::class] = DI\factory(\Portal\Factories\PhpRendererFactory::class);


    $container['dbConnection'] = function (ContainerInterface $c) {
        $settings = $c->get('settings')['db'];
        $db = new PDO($settings['host'] . $settings['dbName'], $settings['userName'], $settings['password']);
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // uncomment to debug DB errors
        return $db;
    };

    $container['TrainersPageController'] =
        DI\factory('Portal\Factories\Controllers\FrontEnd\TrainersPageControllerFactory');
    $container['AddTrainerPageController'] =
        DI\factory('Portal\Factories\Controllers\FrontEnd\AddTrainerPageControllerFactory');

    // API Controllers
    $container['AddTrainerController'] = DI\factory('\Portal\Factories\Controllers\API\AddTrainerControllerFactory');
    $container['DeleteTrainerController'] = DI\factory('\Portal\Factories\Controllers\API\DeleteTrainerControllerFactory');

    // Models
    $container['TrainerModel'] = DI\factory('\Portal\Factories\Models\TrainerModelFactory');

    $containerBuilder->addDefinitions($container);
};
