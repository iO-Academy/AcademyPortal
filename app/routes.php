<?php
declare(strict_types=1);

use Slim\App;

return function (App $app) {
    //Frontend
    $app->get('/', 'HomePageController');
    $app->get('/admin', 'AdminPageController');
    $app->get('/register', 'RegisterPageController');
    $app->get('/addapplicant', 'addApplicantPageController');
    $app->get('/applicants', 'ApplicantsPageController');
    $app->get('/hiringPartners', 'HiringPartnerPageController');
    $app->get('/addHiringPartner', 'AddHiringPartnerPageController');
    $app->get('/addHiringPartnerContact', 'AddHiringPartnerContactPageController');
    $app->get('/events', 'EventsPageController');
    $app->get('/events-past', 'PastEventsPageController');
    $app->get('/addEvent', 'AddEventPageController');
    $app->get('/editStages', 'StagesPageController');
    $app->get('/editApplicant', 'EditApplicantPageController');
    $app->get('/teamPicker', 'TeamPickerPageController');
    $app->get('/student', 'TeamPickerPageController');
    $app->get('/public[/{id}]', 'StudentProfilePageController');
    $app->get('/courses', 'CoursesPageController');
    $app->get('/addCourse', 'AddCoursePageController');


    //API
    $app->get('/api/getStudents', 'GetStudentsController');
    $app->get('/api/getApplicant/{id}', 'GetApplicantController');
    $app->post('/api/saveApplicant', 'AddApplicantController');
    $app->delete('/api/deleteApplicant', 'DeleteApplicantController');
    $app->post('/api/editApplicant', 'EditApplicantController');
    $app->get('/api/applicationForm', 'GetApplicationFormController');
    $app->post('/api/createHiringPartner', 'AddHiringPartnerController');
    $app->get('/api/getHiringPartnerInfo', 'GetHiringPartnersController');
    $app->get('/api/getEvents', 'GetEventsController');
    $app->post('/api/addEvent', 'AddEventController');
    $app->post('/api/addContact', 'AddContactController');
    $app->post('/api/addHiringPartnerToEvent', 'AddHiringPartnerToEventController');
    $app->get('/api/displayCompanyInfo/{id}', 'GetCompanyDetailsModalController');
    $app->post('/api/getHpsByEventId', 'GetHiringPartnersByIdController');
    $app->post('/api/deleteHiringPartnerFromEvent', 'DeleteHiringPartnerFromEventController');
    $app->post('/api/createStage', 'AddStageController');
    $app->delete('/api/deleteStage', 'DeleteStageController');
    $app->put('/api/updateStages', 'EditStageController');
    $app->get('/api/getStages', 'GetStagesController');
    $app->post('/api/login', 'LoginController');
    $app->post('/api/registerUser', 'AddUserController');
    $app->put('/api/editStageOption', 'EditStageOptionController');
    $app->delete('/api/deleteStageOption', 'DeleteStageOptionController');
    $app->post('/api/addStageOption', 'AddStageOptionController');
    $app->delete('/api/deleteAllStageOptions', 'DeleteAllStageOptionsController');
    $app->post('/api/updateTeams', 'EditTeamsController');
    $app->get('/api/getNextStageOptions/{stageid}', 'GetNextStageOptionsController');
    $app->get('/api/progressApplicantStage', 'EditApplicantStageController');
    $app->get('/api/getCourses', 'GetCoursesController');
    $app->post('/api/addCourse', 'AddCourseController');

};