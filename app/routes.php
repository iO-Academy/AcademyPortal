<?php

declare(strict_types=1);

use Portal\Controllers\API\AddApplicantController;
use Portal\Controllers\API\AddAptitudeScoreController;
use Portal\Controllers\API\AddContactController;
use Portal\Controllers\API\AddCourseController;
use Portal\Controllers\API\AddEventController;
use Portal\Controllers\API\AddHiringPartnerController;
use Portal\Controllers\API\AddHiringPartnerToEventController;
use Portal\Controllers\API\AddStageController;
use Portal\Controllers\API\AddStageOptionController;
use Portal\Controllers\API\AddUserController;
use Portal\Controllers\API\CsvController;
use Portal\Controllers\API\DeleteAllStageOptionsController;
use Portal\Controllers\API\DeleteApplicantController;
use Portal\Controllers\API\DeleteHiringPartnerFromEventController;
use Portal\Controllers\API\DeleteStageController;
use Portal\Controllers\API\DeleteStageOptionController;
use Portal\Controllers\API\EditApplicantController;
use Portal\Controllers\API\EditApplicantStageController;
use Portal\Controllers\API\EditStageController;
use Portal\Controllers\API\EditStageOptionController;
use Portal\Controllers\API\EditTeamsController;
use Portal\Controllers\API\GetApplicantController;
use Portal\Controllers\API\GetApplicationFormController;
use Portal\Controllers\API\GetAssessmentApplicantsController;
use Portal\Controllers\API\GetCompanyDetailsModalController;
use Portal\Controllers\API\GetCoursesController;
use Portal\Controllers\API\GetEventCategoriesController;
use Portal\Controllers\API\GetEventsController;
use Portal\Controllers\API\GetGenderController;
use Portal\Controllers\API\GetHiringPartnersByIdController;
use Portal\Controllers\API\GetHiringPartnersController;
use Portal\Controllers\API\GetNextStageOptionsController;
use Portal\Controllers\API\GetStagesController;
use Portal\Controllers\API\GetStudentsController;
use Portal\Controllers\API\LoginController;
use Portal\Controllers\FrontEnd\AddApplicantPageController;
use Portal\Controllers\FrontEnd\AddCoursePageController;
use Portal\Controllers\FrontEnd\AddEventPageController;
use Portal\Controllers\FrontEnd\AddHiringPartnerContactPageController;
use Portal\Controllers\FrontEnd\AddHiringPartnerPageController;
use Portal\Controllers\FrontEnd\AdminPageController;
use Portal\Controllers\FrontEnd\ApplicantsPageController;
use Portal\Controllers\FrontEnd\CoursesPageController;
use Portal\Controllers\FrontEnd\EditApplicantPageController;
use Portal\Controllers\FrontEnd\EventsPageController;
use Portal\Controllers\FrontEnd\GetCsvFormController;
use Portal\Controllers\FrontEnd\HiringPartnerPageController;
use Portal\Controllers\FrontEnd\HomePageController;
use Portal\Controllers\FrontEnd\PastEventsPageController;
use Portal\Controllers\FrontEnd\RegisterPageController;
use Portal\Controllers\FrontEnd\StagesPageController;
use Portal\Controllers\FrontEnd\StudentApplicationFormPageController;
use Portal\Controllers\FrontEnd\StudentProfilePageController;
use Portal\Controllers\FrontEnd\TeamPickerPageController;
use Slim\App;

return function (App $app) {
    //Frontend
    $app->get('/', HomePageController::class);
    $app->get('/admin', AdminPageController::class);
    $app->get('/register', RegisterPageController::class);
    $app->get('/addapplicant', AddApplicantPageController::class);
    $app->get('/applicants', ApplicantsPageController::class);
    $app->get('/hiringPartners', HiringPartnerPageController::class);
    $app->get('/addHiringPartner', AddHiringPartnerPageController::class);
    $app->get('/addHiringPartnerContact', AddHiringPartnerContactPageController::class);
    $app->get('/events', EventsPageController::class);
    $app->get('/events-past', PastEventsPageController::class);
    $app->get('/addEvent', AddEventPageController::class);
    $app->get('/editStages', StagesPageController::class);
    $app->get('/editApplicant', EditApplicantPageController::class);
    $app->get('/teamPicker', TeamPickerPageController::class);
    $app->get('/student', TeamPickerPageController::class);
    $app->get('/public[/{id}]', StudentProfilePageController::class);
    $app->post('/public[/{id}]', StudentProfilePageController::class);
    $app->get('/courses', CoursesPageController::class);
    $app->get('/addCourse', AddCoursePageController::class);
    $app->get('/studentApplicationForm', StudentApplicationFormPageController::class);
    $app->get('/csvForm', GetCsvFormController::class);

    // TODO: fix these
    $app->get('/trainers', 'TrainersPageController');
    $app->get('/addTrainer', 'AddTrainerPageController');

    //API
    $app->get('/api/getStudents', GetStudentsController::class);
    $app->get('/api/getApplicant/{id}', GetApplicantController::class);
    $app->post('/api/saveApplicant', AddApplicantController::class);
    $app->delete('/api/deleteApplicant', DeleteApplicantController::class);
    $app->post('/api/editApplicant', EditApplicantController::class);
    $app->get('/api/applicationForm', GetApplicationFormController::class);
    $app->post('/api/createHiringPartner', AddHiringPartnerController::class);
    $app->get('/api/getHiringPartnerInfo', GetHiringPartnersController::class);
    $app->get('/api/getEvents', GetEventsController::class);
    $app->get('/api/getAssessmentApplicants', GetAssessmentApplicantsController::class);
    $app->post('/api/addEvent', AddEventController::class);
    $app->post('/api/addContact', AddContactController::class);
    $app->post('/api/addHiringPartnerToEvent', AddHiringPartnerToEventController::class);
    $app->get('/api/displayCompanyInfo/{id}', GetCompanyDetailsModalController::class);
    $app->post('/api/getHpsByEventId', GetHiringPartnersByIdController::class);
    $app->post('/api/deleteHiringPartnerFromEvent', DeleteHiringPartnerFromEventController::class);
    $app->post('/api/createStage', AddStageController::class);
    $app->delete('/api/deleteStage', DeleteStageController::class);
    $app->put('/api/updateStages', EditStageController::class);
    $app->get('/api/getStages', GetStagesController::class);
    $app->get('/api/getGender', GetGenderController::class);
    $app->post('/api/login', LoginController::class);
    $app->post('/api/registerUser', AddUserController::class);
    $app->put('/api/editStageOption', EditStageOptionController::class);
    $app->delete('/api/deleteStageOption', DeleteStageOptionController::class);
    $app->post('/api/addStageOption', AddStageOptionController::class);
    $app->delete('/api/deleteAllStageOptions', DeleteAllStageOptionsController::class);
    $app->post('/api/updateTeams', EditTeamsController::class);
    $app->get('/api/getNextStageOptions/{stageid}', GetNextStageOptionsController::class);
    $app->get('/api/progressApplicantStage', EditApplicantStageController::class);
    $app->get('/api/getCourses', GetCoursesController::class);
    $app->post('/api/addCourse', AddCourseController::class);
    $app->post('/api/csvUpload', CsvController::class);
    $app->get('/api/getEventCategories', GetEventCategoriesController::class);
    $app->put('/api/aptitudeScore', AddAptitudeScoreController::class);


    // TODO: fix these
    $app->post('/api/addTrainer', 'AddTrainerController');
    $app->delete('/api/deleteTrainer', 'DeleteTrainerController');
};
