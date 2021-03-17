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
        return new PhpRenderer($settings['template_path']);
    };

    $container['dbConnection'] = function (ContainerInterface $c) {
        $settings = $c->get('settings')['db'];
        $db = new PDO($settings['host'] . $settings['dbName'], $settings['userName'], $settings['password']);
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // uncomment to debug DB errors
        return $db;
    };

    // Controllers
    // Front end Controllers
    $container['HomePageController'] = DI\factory('\Portal\Factories\Controllers\FrontEnd\HomePageControllerFactory');
    $container['AdminPageController'] = DI\factory('\Portal\Factories\Controllers\FrontEnd\AdminPageControllerFactory');
    $container['RegisterPageController'] =
        DI\factory('\Portal\Factories\Controllers\FrontEnd\RegisterPageControllerFactory');
    $container['addApplicantPageController'] =
        DI\factory('\Portal\Factories\Controllers\FrontEnd\AddApplicantPageControllerFactory');
    $container['ApplicantsPageController'] =
        DI\factory('\Portal\Factories\Controllers\FrontEnd\ApplicantsPageControllerFactory');
    $container['StudentProfilePageController'] =
        DI\factory('\Portal\Factories\Controllers\FrontEnd\StudentProfilePageControllerFactory');
    $container['HiringPartnerPageController'] =
        DI\factory('\Portal\Factories\Controllers\FrontEnd\HiringPartnerPageControllerFactory');
    $container['AddHiringPartnerPageController'] =
        DI\factory('\Portal\Factories\Controllers\FrontEnd\AddHiringPartnerPageControllerFactory');
    $container['AddHiringPartnerContactPageController'] =
        DI\factory('\Portal\Factories\Controllers\FrontEnd\AddHiringPartnerContactPageControllerFactory');
    $container['EventsPageController'] =
        DI\factory('\Portal\Factories\Controllers\FrontEnd\EventsPageControllerFactory');
    $container['PastEventsPageController'] =
        DI\factory('\Portal\Factories\Controllers\FrontEnd\PastEventsPageControllerFactory');
    $container['AddEventPageController'] =
        DI\factory('\Portal\Factories\Controllers\FrontEnd\AddEventPageControllerFactory');
    $container['StagesPageController'] =
        DI\factory('\Portal\Factories\Controllers\FrontEnd\StagesPageControllerFactory');
    $container['EditApplicantPageController'] =
        DI\factory('\Portal\Factories\Controllers\FrontEnd\EditApplicantPageControllerFactory');
    $container['TeamPickerPageController'] =
        DI\factory('\Portal\Factories\Controllers\FrontEnd\TeamPickerPageControllerFactory');
    $container['CoursesPageController'] =
        DI\factory('\Portal\Factories\Controllers\FrontEnd\CoursesPageControllerFactory');
    $container['AddCoursePageController'] =
        DI\factory('\Portal\Factories\Controllers\FrontEnd\AddCoursePageControllerFactory');
    // API Controllers
    $container['AddUserController'] = DI\factory('\Portal\Factories\Controllers\API\AddUserControllerFactory');
    $container['GetApplicationFormController'] =
        DI\factory('\Portal\Factories\Controllers\API\GetApplicationFormControllerFactory');
    $container['AddApplicantController'] =
        DI\factory('\Portal\Factories\Controllers\API\AddApplicantControllerFactory');
    $container['GetApplicantController'] =
        DI\factory('\Portal\Factories\Controllers\API\GetApplicantControllerFactory');
    $container['GetStudentsController'] = DI\factory('\Portal\Factories\Controllers\API\GetStudentsControllerFactory');
    $container['LoginController'] = DI\factory('\Portal\Factories\Controllers\API\LoginControllerFactory');
    $container['AddHiringPartnerController'] =
        DI\factory('\Portal\Factories\Controllers\API\AddHiringPartnerControllerFactory');
    $container['GetHiringPartnersController'] =
        DI\factory('\Portal\Factories\Controllers\API\GetHiringPartnerControllerFactory');
    $container['GetCompanyDetailsModalController'] =
        DI\factory('\Portal\Factories\Controllers\API\GetCompanyDetailsModalControllerFactory');
    $container['AddContactController'] = DI\factory('\Portal\Factories\Controllers\API\AddContactControllerFactory');
    $container['GetEventsController'] = DI\factory('\Portal\Factories\Controllers\API\GetEventsControllerFactory');
    $container['GetHiringPartnersByIdController'] =
        DI\factory('\Portal\Factories\Controllers\API\GetHiringPartnersByIdControllerFactory');
    $container['AddHiringPartnerToEventController'] =
        DI\factory('\Portal\Factories\Controllers\API\AddHiringPartnerToEventControllerFactory');
    $container['AddEventController'] = DI\factory('\Portal\Factories\Controllers\API\AddEventControllerFactory');
    $container['DeleteHiringPartnerFromEventController'] =
        DI\factory('\Portal\Factories\Controllers\API\DeleteHiringPartnerFromEventControllerFactory');
    $container['DeleteApplicantController'] =
        DI\factory('\Portal\Factories\Controllers\API\DeleteApplicantControllerFactory');
    $container['AddStageController'] = DI\factory('\Portal\Factories\Controllers\API\AddStageControllerFactory');
    $container['GetStagesController'] = DI\factory('\Portal\Factories\Controllers\API\GetStagesControllerFactory');
    $container['DeleteStageController'] = DI\factory('\Portal\Factories\Controllers\API\DeleteStageControllerFactory');
    $container['EditStageController'] = DI\factory('\Portal\Factories\Controllers\API\EditStageControllerFactory');
    $container['EditApplicantController'] =
        DI\factory('\Portal\Factories\Controllers\API\EditApplicantControllerFactory');
    $container['AddStageOptionController'] =
        DI\factory('\Portal\Factories\Controllers\API\AddStageOptionControllerFactory');
    $container['EditStageOptionController'] =
        DI\factory('\Portal\Factories\Controllers\API\EditStageOptionControllerFactory');
    $container['DeleteStageOptionController'] =
        DI\factory('\Portal\Factories\Controllers\API\DeleteStageOptionControllerFactory');
    $container['DeleteAllStageOptionsController'] =
        DI\factory('\Portal\Factories\Controllers\API\DeleteAllStageOptionsControllerFactory');
    $container['EditTeamsController'] = DI\factory('\Portal\Factories\Controllers\API\EditTeamsControllerFactory');
    $container['GetNextStageOptionsController'] =
        DI\factory('\Portal\Factories\Controllers\API\GetNextStageOptionsControllerFactory');
    $container['EditApplicantStageController'] =
        DI\factory('\Portal\Factories\Controllers\API\EditApplicantStageControllerFactory');
    $container['GetCoursesController'] = DI\factory('\Portal\Factories\Controllers\API\GetCoursesControllerFactory');
    $container['AddCourseController'] = DI\factory('\Portal\Factories\Controllers\API\AddCourseControllerFactory');

    // Models
    $container['UserModel'] = DI\factory('\Portal\Factories\Models\UserModelFactory');
    $container['ApplicationFormModel'] = DI\factory('\Portal\Factories\Models\ApplicationFormModelFactory');
    $container['ApplicantModel'] = DI\factory('\Portal\Factories\Models\ApplicantModelFactory');
    $container['HiringPartnerModel'] = DI\factory('\Portal\Factories\Models\HiringPartnerModelFactory');
    $container['EventModel'] = DI\factory('\Portal\Factories\Models\EventModelFactory');
    $container['RandomPasswordModel'] = DI\factory('\Portal\Models\RandomPasswordModel');
    $container['StageModel'] = DI\factory('\Portal\Factories\Models\StageModelFactory');
    $container['TeamModel'] = DI\factory('\Portal\Factories\Models\TeamModelFactory');
    $container['CourseModel'] = DI\factory('\Portal\Factories\Models\CourseModelFactory');

    $containerBuilder->addDefinitions($container);
};
