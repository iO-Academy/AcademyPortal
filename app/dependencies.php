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
//        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // uncomment to debug DB errors
        return $db;
    };

    // Controllers
    $container['HomePageController'] = DI\factory('\Portal\Factories\HomePageControllerFactory');
    $container['AdminController'] = DI\factory('\Portal\Factories\AdminControllerFactory');
    $container['RegisterController'] = DI\factory('\Portal\Factories\RegisterControllerFactory');
    $container['LoginController'] = DI\factory('\Portal\Factories\Controllers\API\LoginControllerFactory');
    $container['RegisterUserController'] = DI\factory('\Portal\Factories\Controllers\API\RegisterUserControllerFactory');
    $container['addApplicantController'] = DI\factory('\Portal\Factories\AddApplicantControllerFactory');
    $container['ApplicationFormController'] = DI\factory('\Portal\Factories\Controllers\API\ApplicationFormControllerFactory');
    $container['SaveApplicantController'] = DI\factory('\Portal\Factories\Controllers\API\SaveApplicantControllerFactory');
    $container['DisplayApplicantsController'] = DI\factory('\Portal\Factories\DisplayApplicantsControllerFactory');
    $container['GetApplicantController'] = DI\factory('\Portal\Factories\Controllers\API\GetApplicantControllerFactory');
    $container['GetStudentsController'] = DI\factory('\Portal\Factories\Controllers\API\GetStudentsControllerFactory');
    $container['DisplayStudentProfileController'] = DI\factory('\Portal\Factories\DisplayStudentProfileControllerFactory');
    $container['DisplayHiringPartnerPageController'] = DI\factory('\Portal\Factories\DisplayHiringPartnerPageControllerFactory');
    $container['AddHiringPartnerPageController'] = DI\factory('\Portal\Factories\AddHiringPartnerPageControllerFactory');
    $container['AddHiringPartnerContactPageController'] = DI\factory('\Portal\Factories\AddHiringPartnerContactPageControllerFactory');
    $container['CreateHiringPartnerController'] = DI\factory('\Portal\Factories\Controllers\API\CreateHiringPartnerControllerFactory');
    $container['GetHiringPartnersController'] = DI\factory('\Portal\Factories\Controllers\API\GetHiringPartnerControllerFactory');
    $container['CompanyDetailsModalController'] = DI\factory('\Portal\Factories\Controllers\API\CompanyDetailsModalControllerFactory');
    $container['AddContactController'] = DI\factory('\Portal\Factories\Controllers\API\AddContactControllerFactory');
    $container['DisplayEventsPageController'] = DI\factory('\Portal\Factories\DisplayEventsPageControllerFactory');
    $container['DisplayPastEventsPageController'] = DI\factory('\Portal\Factories\DisplayPastEventsPageControllerFactory');
    $container['AddEventPageController'] = DI\factory('\Portal\Factories\AddEventPageControllerFactory');
    $container['GetEventsController'] = DI\factory('\Portal\Factories\Controllers\API\GetEventsControllerFactory');
    $container['GetHiringPartnersByIdController'] = DI\factory('\Portal\Factories\Controllers\API\GetHiringPartnersByIdControllerFactory');
    $container['AddHiringPartnerToEventController'] = DI\factory('\Portal\Factories\Controllers\API\AddHiringPartnerToEventControllerFactory');
    $container['AddEventController'] = DI\factory('\Portal\Factories\Controllers\API\AddEventControllerFactory');
    $container['RemoveHiringPartnerFromEventController'] = DI\factory('\Portal\Factories\Controllers\API\RemoveHiringPartnerFromEventControllerFactory');
    $container['DeleteApplicantController'] = DI\factory('\Portal\Factories\Controllers\API\DeleteApplicantControllerFactory');
    $container['CreateStageController'] = DI\factory('\Portal\Factories\Controllers\API\CreateStageControllerFactory');
    $container['GetStagesController'] = DI\factory('\Portal\Factories\Controllers\API\GetStagesControllerFactory');
    $container['DisplayStagesController'] = DI\factory('\Portal\Factories\DisplayStagesControllerFactory');
    $container['DeleteStageController'] = DI\factory('\Portal\Factories\Controllers\API\DeleteStageControllerFactory');
    $container['EditStageController'] = DI\factory('\Portal\Factories\Controllers\API\EditStageControllerFactory');
    $container['DisplayEditApplicantController'] = DI\factory('\Portal\Factories\DisplayEditApplicantControllerFactory');
    $container['EditApplicantController'] = DI\factory('\Portal\Factories\Controllers\API\EditApplicantControllerFactory');
    $container['AddStageOptionController'] = DI\factory('\Portal\Factories\Controllers\API\AddStageOptionControllerFactory');
    $container['EditStageOptionController'] = DI\factory('\Portal\Factories\Controllers\API\EditStageOptionControllerFactory');
    $container['DeleteStageOptionController'] = DI\factory('\Portal\Factories\Controllers\API\DeleteStageOptionControllerFactory');
    $container['DeleteAllStageOptionsController'] = DI\factory('\Portal\Factories\Controllers\API\DeleteAllStageOptionsControllerFactory');
    $container['DisplayTeamPickerController'] = DI\factory('\Portal\Factories\DisplayTeamPickerControllerFactory');
    $container['UpdateTeamsController'] = DI\factory('\Portal\Factories\Controllers\API\UpdateTeamsControllerFactory');
    $container['GetNextStageOptionsController'] = DI\factory('\Portal\Factories\Controllers\API\GetNextStageOptionsControllerFactory');
    $container['ProgressApplicantStageController'] = DI\factory('\Portal\Factories\Controllers\API\ProgressApplicantStageControllerFactory');
    $container['DisplayCoursesController'] = DI\factory('\Portal\Factories\DisplayCoursesControllerFactory');
    $container['DisplayAddCourseController'] = DI\factory('\Portal\Factories\DisplayAddCourseControllerFactory');
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
