<?php
declare(strict_types=1);

use Slim\App;

return function (App $app) {
    //Frontend
    $app->get('/', 'HomePageController');
    $app->get('/admin', 'AdminController');
    $app->get('/register', 'RegisterController');
    $app->get('/addapplicant', 'addApplicantController');
    $app->get('/displayApplicants', 'DisplayApplicantsController');
    $app->get('/displayHiringPartnerPage', 'DisplayHiringPartnerPageController');
    $app->get('/displayEventsPage', 'DisplayEventsPageController');
    $app->get('/displayStages', 'DisplayStagesController');
    $app->get('/editApplicant', 'EditApplicantController');

    //API
    $app->get('/api/getApplicant/{id}', 'GetApplicantController');
    $app->post('/api/saveApplicant', 'SaveApplicantController');
    $app->delete('/api/deleteApplicant', 'DeleteApplicantController');
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
};
