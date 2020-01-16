<?php
declare(strict_types=1);

use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    //Frontend
    $app->get('/', 'HomePageController');
    $app->get('/admin', 'AdminController');
    $app->get('/register', 'RegisterController');

    $app->get('/addapplicant', 'addApplicantController');
    $app->get('/displayApplicants', 'DisplayApplicantsController');
    $app->get('/displayEventsPage', 'DisplayEventsPageController');

    $app->get('/displayApplicantInfo/{id}', 'GetApplicantController');
    $app->get('/displayHiringPartnerPage', 'DisplayHiringPartnerPageController');



    //API
    $app->post('/api/saveApplicant', 'SaveApplicantController');
    $app->get('/api/applicationForm', 'ApplicationFormController');
    $app->post('/api/createHiringPartner', 'CreateHiringPartnerController');
    $app->get('/api/getHiringPartnerInfo', 'GetHiringPartnersController');
    $app->get('/api/getEvents', 'GetEventsController');
    $app->post('/api/addContact', 'AddContactController');
    $app->post('/api/getHpsByEventId', 'GetHiringPartnersByIdController');
    $app->post('/api/addEvent', 'AddEventController');
    $app->post('/api/addHiringPartnerToEvent', 'AddHiringPartnerToEventController');
    $app->get('/api/displayCompanyInfo/{id}', 'CompanyDetailsModalController');



    //Backend
    $app->post('/api/login', 'LoginController');
    $app->post('/api/registerUser', 'RegisterUserController');

};
