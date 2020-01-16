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

    $container['renderer'] = function (ContainerInterface $c) {
        $settings = $c->get('settings')['renderer'];
        $renderer = new PhpRenderer($settings['template_path']);
        return $renderer;
    };

    $container['dbConnection'] = function (ContainerInterface $c) {
        $settings = $c->get('settings')['db'];
        $db = new PDO($settings['host'] . $settings['dbName'], $settings['userName'], $settings['password']);
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
        return $db;
    };

    $container['HomePageController'] = function(ContainerInterface $c) {
        $controller = new \Portal\Factories\HomePageControllerFactory();
        return $controller($c);
    };

    $container['AdminController'] = function(ContainerInterface $c) {
        $controller = new \Portal\Factories\AdminControllerFactory();
        return $controller($c);
    };

    $container['RegisterController'] = function(ContainerInterface $c) {
        $controller = new \Portal\Factories\RegisterControllerFactory();
        return $controller($c);
    };

    $container['LoginController'] = function (ContainerInterface $c) {
        $controller = new \Portal\Factories\LoginControllerFactory();
        return $controller($c);
    };

    $container['RegisterUserController'] = function(ContainerInterface $c) {
        $controller = new \Portal\Factories\RegisterUserControllerFactory();
        return $controller($c);
    };

    $container['addApplicantController'] = function(ContainerInterface $c) {
        $controller = new \Portal\Factories\AddApplicantControllerFactory();
        return $controller($c);
    };

    $container['ApplicationFormModel'] = function(ContainerInterface $c) {
        $model = new \Portal\Factories\ApplicationFormModelFactory();
        return $model($c);
    };

    $container['ApplicationFormController'] = function(ContainerInterface $c) {
        $controller = new \Portal\Factories\ApplicationFormControllerFactory();
        return $controller($c);
    };

    $container['SaveApplicantController'] = function(ContainerInterface $c) {
        $controller = new \Portal\Factories\SaveApplicantControllerFactory();
        return $controller($c);
    };

    $container['DisplayApplicantsController'] = function(ContainerInterface $c) {
        $controller = new \Portal\Factories\DisplayApplicantsControllerFactory();
        return $controller($c);
    };

    $container['GetApplicantController'] = function(ContainerInterface $c) {
        $controller = new \Portal\Factories\GetApplicantControllerFactory();
        return $controller($c);
    };

    $container['DisplayHiringPartnerPageController'] = function(ContainerInterface $c) {
        $controller = new \Portal\Factories\DisplayHiringPartnerPageControllerFactory();
        return $controller($c);
    };

    $container['CreateHiringPartnerController'] = function(ContainerInterface $c) {
        $controller = new \Portal\Factories\CreateHiringPartnerControllerFactory();
        return $controller($c);
    };

    $container['GetHiringPartnersController'] = function(ContainerInterface $c) {
        $controller = new \Portal\Factories\GetHiringPartnerControllerFactory();
        return $controller($c);
    };

    $container['CompanyDetailsModalController'] = function(ContainerInterface $c) {
        $controller = new \Portal\Factories\CompanyDetailsModalControllerFactory();
        return $controller($c);
    };

    $container['AddContactController'] = function(ContainerInterface $c) {
        $controller = new \Portal\Factories\AddContactControllerFactory();
        return $controller($c);
    };

    $container['DisplayEventsPageController'] = function(ContainerInterface $c) {
        $controller = new \Portal\Factories\DisplayEventsPageControllerFactory();
        return $controller($c);
    };

    $container['GetEventsController'] = function(ContainerInterface $c) {
        $controller = new \Portal\Factories\GetEventsControllerFactory();
        return $controller($c);
    };

    $container['GetHiringPartnersByIdController'] = function(ContainerInterface $c) {
        $controller = new \Portal\Factories\GetHiringPartnersByIdControllerFactory();
        return $controller($c);
    };

    $container['AddHiringPartnerToEventController'] = function(ContainerInterface $c) {
        $controller = new \Portal\Factories\AddHiringPartnerToEventControllerFactory();
        return $controller($c);
    };

    $container['AddEventController'] = function(ContainerInterface $c) {
        $controller = new \Portal\Factories\AddEventControllerFactory();
        return $controller($c);
    };

    $container['UserModel'] = function(ContainerInterface $c) {
        $model = new \Portal\Factories\UserModelFactory();
        return $model($c);
    };

    $container['ApplicantModel'] = function(ContainerInterface $c) {
        $model = new \Portal\Factories\ApplicantModelFactory();
        return $model($c);
    };

    $container['HiringPartnerModel'] = function(ContainerInterface $c) {
        $model = new \Portal\Factories\HiringPartnerModelFactory();
        return $model($c);
    };

    $container['EventModel'] = function(ContainerInterface $c) {
        $model = new \Portal\Factories\EventModelFactory();
        return $model($c);
    };


    $container['RandomPasswordModel'] = function() {
        $model = new \Portal\Models\RandomPasswordModel();
        return $model();
    };

    $containerBuilder->addDefinitions($container);
};
