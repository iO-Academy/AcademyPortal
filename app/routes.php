<?php
declare(strict_types=1);

use Slim\App;

return function (App $app) {
    //Frontend
    $app->get('/', \Portal\Controllers\FrontEnd\HomePageController::class);
    $app->get('/admin', \Portal\Controllers\FrontEnd\AdminPageController::class);
    $app->get('/register', \Portal\Controllers\FrontEnd\RegisterPageController::class);
    $app->get('/addapplicant', \Portal\Controllers\FrontEnd\AddApplicantPageController::class);
    $app->get('/applicants', \Portal\Controllers\FrontEnd\ApplicantsPageController::class);
    $app->get('/hiringPartners', \Portal\Controllers\FrontEnd\HiringPartnerPageController::class);
    $app->get('/addHiringPartner', \Portal\Controllers\FrontEnd\AddHiringPartnerPageController::class);
    $app->get('/addHiringPartnerContact', \Portal\Controllers\FrontEnd\AddHiringPartnerContactPageController::class);
    $app->get('/events', \Portal\Controllers\FrontEnd\EventsPageController::class);
    $app->get('/events-past', \Portal\Controllers\FrontEnd\PastEventsPageController::class);
    $app->get('/addEvent', \Portal\Controllers\FrontEnd\AddEventPageController::class);
    $app->get('/editStages', \Portal\Controllers\FrontEnd\StagesPageController::class);
    $app->get('/editApplicant', \Portal\Controllers\FrontEnd\EditApplicantPageController::class);
    $app->get('/teamPicker', \Portal\Controllers\FrontEnd\TeamPickerPageController::class);
    $app->get('/student', \Portal\Controllers\FrontEnd\TeamPickerPageController::class);
    $app->get('/public[/{id}]', \Portal\Controllers\FrontEnd\StudentProfilePageController::class);
    $app->post('/public[/{id}]', \Portal\Controllers\FrontEnd\StudentProfilePageController::class);
    $app->get('/courses', \Portal\Controllers\FrontEnd\CoursesPageController::class);
    $app->get('/addCourse', \Portal\Controllers\FrontEnd\AddCoursePageController::class);
    $app->get('/studentApplicationForm', \Portal\Controllers\FrontEnd\StudentApplicationFormPageController::class);
    $app->get('/csvForm', \Portal\Controllers\FrontEnd\GetCsvFormController::class);

    //API
    $app->get('/api/getStudents', \Portal\Controllers\API\GetStudentsController::class);
    $app->get('/api/getApplicant/{id}', \Portal\Controllers\API\GetApplicantController::class);
    $app->post('/api/saveApplicant', \Portal\Controllers\API\AddApplicantController::class);
    $app->delete('/api/deleteApplicant', \Portal\Controllers\API\DeleteApplicantController::class);
    $app->post('/api/editApplicant', \Portal\Controllers\API\EditApplicantController::class);
    $app->get('/api/applicationForm', \Portal\Controllers\API\GetApplicationFormController::class);
    $app->post('/api/createHiringPartner', 'AddHiringPartnerController');
    $app->get('/api/getHiringPartnerInfo', \Portal\Controllers\API\GetHiringPartnersController::class);
    $app->get('/api/getEvents', \Portal\Controllers\API\GetEventsController::class);
    $app->get('/api/getAssessmentApplicants', \Portal\Controllers\API\GetAssessmentApplicantsController::class);
    $app->post('/api/addEvent', 'AddEventController');
    $app->post('/api/addContact', 'AddContactController');
    $app->post('/api/addHiringPartnerToEvent', 'AddHiringPartnerToEventController');
    $app->get('/api/displayCompanyInfo/{id}', \Portal\Controllers\API\GetCompanyDetailsModalController::class);
    $app->post('/api/getHpsByEventId', 'GetHiringPartnersByIdController');
    $app->post('/api/deleteHiringPartnerFromEvent', 'DeleteHiringPartnerFromEventController');
    $app->post('/api/createStage', 'AddStageController');
    $app->delete('/api/deleteStage', 'DeleteStageController');
    $app->put('/api/updateStages', 'EditStageController');
    $app->get('/api/getStages', \Portal\Controllers\API\GetStagesController::class);
    $app->get('/api/getGender', \Portal\Controllers\API\GetGenderController::class);
    $app->post('/api/login', 'LoginController');
    $app->post('/api/registerUser', 'AddUserController');
    $app->put('/api/editStageOption', 'EditStageOptionController');
    $app->delete('/api/deleteStageOption', 'DeleteStageOptionController');
    $app->post('/api/addStageOption', 'AddStageOptionController');
    $app->delete('/api/deleteAllStageOptions', 'DeleteAllStageOptionsController');
    $app->post('/api/updateTeams', 'EditTeamsController');
    $app->get('/api/getNextStageOptions/{stageid}', \Portal\Controllers\API\GetNextStageOptionsController::class);
    $app->get('/api/progressApplicantStage', \Portal\Controllers\API\EditApplicantStageController::class);
    $app->get('/api/getCourses', \Portal\Controllers\API\GetCoursesController::class);
    $app->post('/api/addCourse', 'AddCourseController');
    $app->post('/api/csvUpload', 'CsvController');
    $app->get('/api/getEventCategories', \Portal\Controllers\API\GetEventCategoriesController::class);
    $app->put('/api/aptitudeScore', \Portal\Controllers\API\AddAptitudeScoreController::class);
};
