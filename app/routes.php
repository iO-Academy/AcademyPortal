<?php
declare(strict_types=1);

use Slim\App;

return function (App $app) {
    //Frontend
    $app->get('/', 'HomePageController');
    $app->get('/admin', 'AdminController');
    $app->get('/register', 'RegisterController');
    $app->get('/addapplicant', 'addApplicantController');
    $app->get('/applicants', 'DisplayApplicantsController');
    $app->get('/hiringPartners', 'DisplayHiringPartnerPageController');
    $app->get('/addHiringPartner', 'AddHiringPartnerPageController');
    $app->get('/addHiringPartnerContact', 'AddHiringPartnerContactPageController');
    $app->get('/events', 'DisplayEventsPageController');
    $app->get('/events-past', 'DisplayPastEventsPageController');
    $app->get('/addEvent', 'AddEventPageController');
    $app->get('/editStages', 'DisplayStagesController');
    $app->get('/editApplicant', 'DisplayEditApplicantController');
    $app->get('/teamPicker', 'DisplayTeamPickerController');
    $app->get('/courses', 'DisplayCoursesController');
    $app->get('/addCourse', 'DisplayAddCourseController');

    //API
    $app->get('/api/getStudents', 'GetStudentsController');
    $app->get('/api/getApplicant/{id}', 'GetApplicantController');
    $app->post('/api/saveApplicant', 'SaveApplicantController');
    $app->delete('/api/deleteApplicant', 'DeleteApplicantController');
    $app->post('/api/editApplicant', 'EditApplicantController');
    $app->get('/api/applicationForm', 'ApplicationFormController');
    $app->post('/api/createHiringPartner', 'CreateHiringPartnerController');
    $app->get('/api/getHiringPartnerInfo', 'GetHiringPartnersController');
    $app->get('/api/getEvents', 'GetEventsController');
    $app->post('/api/addEvent', 'AddEventController');
    $app->post('/api/addContact', 'AddContactController');
    $app->post('/api/addHiringPartnerToEvent', 'AddHiringPartnerToEventController');
    $app->get('/api/displayCompanyInfo/{id}', 'CompanyDetailsModalController');
    $app->post('/api/getHpsByEventId', 'GetHiringPartnersByIdController');
    $app->post('/api/deleteHiringPartnerFromEvent', 'RemoveHiringPartnerFromEventController');
    $app->post('/api/createStage', 'CreateStageController');
    $app->delete('/api/deleteStage', 'DeleteStageController');
    $app->put('/api/updateStages', 'EditStageController');
    $app->post('/api/login', 'LoginController');
    $app->post('/api/registerUser', 'RegisterUserController');
    $app->put('/api/editStageOption', 'EditStageOptionController');
    $app->delete('/api/deleteStageOption', 'DeleteStageOptionController');
    $app->post('/api/addStageOption', 'AddStageOptionController');
    $app->delete('/api/deleteAllStageOptions', 'DeleteAllStageOptionsController');
    $app->post('/api/updateTeams', 'UpdateTeamsController');
    $app->get('/api/getCourses', 'GetCoursesController');
    $app->post('/api/addCourse', 'AddCourseController');


};
