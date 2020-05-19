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

    // Controllers
    $container['HomePageController'] = DI\factory('\Portal\Factories\HomePageControllerFactory');
    $container['AdminController'] = DI\factory('\Portal\Factories\AdminControllerFactory');
    $container['RegisterController'] = DI\factory('\Portal\Factories\RegisterControllerFactory');
    $container['LoginController'] = DI\factory('\Portal\Factories\LoginControllerFactory');
    $container['RegisterUserController'] = DI\factory('\Portal\Factories\RegisterUserControllerFactory');
    $container['addApplicantController'] = DI\factory('\Portal\Factories\AddApplicantControllerFactory');
    $container['ApplicationFormController'] = DI\factory('\Portal\Factories\ApplicationFormControllerFactory');
    $container['SaveApplicantController'] = DI\factory('\Portal\Factories\SaveApplicantControllerFactory');
    $container['DisplayApplicantsController'] = DI\factory('\Portal\Factories\DisplayApplicantsControllerFactory');
    $container['GetApplicantController'] = DI\factory('\Portal\Factories\GetApplicantControllerFactory');
    $container['DisplayHiringPartnerPageController'] = DI\factory('\Portal\Factories\DisplayHiringPartnerPageControllerFactory');
    $container['CreateHiringPartnerController'] = DI\factory('\Portal\Factories\CreateHiringPartnerControllerFactory');
    $container['GetHiringPartnersController'] = DI\factory('\Portal\Factories\GetHiringPartnerControllerFactory');
    $container['CompanyDetailsModalController'] = DI\factory('\Portal\Factories\CompanyDetailsModalControllerFactory');
    $container['AddContactController'] = DI\factory('\Portal\Factories\AddContactControllerFactory');
    $container['DisplayEventsPageController'] = DI\factory('\Portal\Factories\DisplayEventsPageControllerFactory');
    $container['GetEventsController'] = DI\factory('\Portal\Factories\GetEventsControllerFactory');
    $container['GetHiringPartnersByIdController'] = DI\factory('\Portal\Factories\GetHiringPartnersByIdControllerFactory');
    $container['AddHiringPartnerToEventController'] = DI\factory('\Portal\Factories\AddHiringPartnerToEventControllerFactory');
    $container['AddEventController'] = DI\factory('\Portal\Factories\AddEventControllerFactory');
    $container['RemoveHiringPartnerFromEventController'] = DI\factory('\Portal\Factories\RemoveHiringPartnerFromEventControllerFactory');
    $container['DeleteApplicantController'] = DI\factory('\Portal\Factories\DeleteApplicantControllerFactory');
    $container['CreateStageController'] = DI\factory('\Portal\Factories\CreateStageControllerFactory');
    $container['DisplayStagesController'] = DI\factory('\Portal\Factories\DisplayStagesControllerFactory');
    $container['DeleteStageController'] = DI\factory('\Portal\Factories\DeleteStageControllerFactory');
    $container['EditStageController'] = DI\factory('\Portal\Factories\EditStageControllerFactory');
    $container['AddStageOptionController'] =DI\factory('\Portal\Factories\AddStageOptionController');
    $container['EditStageOptionController'] =DI\factory('\Portal\Factories\EditStageOptionController');
    $container['DeleteStageOptionController'] =DI\factory('\Portal\Factories\DeleteStageOptionController');
    $container['DeleteAllStageOptionsController'] =DI\factory('\Portal\Factories\DeleteAllStageOptionsController');

    // Models
    $container['UserModel'] = DI\factory('\Portal\Factories\UserModelFactory');
    $container['ApplicationFormModel'] = DI\factory('\Portal\Factories\ApplicationFormModelFactory');
    $container['ApplicantModel'] = DI\factory('\Portal\Factories\ApplicantModelFactory');
    $container['HiringPartnerModel'] = DI\factory('\Portal\Factories\HiringPartnerModelFactory');
    $container['EventModel'] = DI\factory('\Portal\Factories\EventModelFactory');
    $container['RandomPasswordModel'] = DI\factory('\Portal\Models\RandomPasswordModel');
    $container['StageModel'] = DI\factory('\Portal\Factories\StageModelFactory');
    
    $containerBuilder->addDefinitions($container);
};
