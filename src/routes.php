<?php

//FrontEnd
$app->get('/', 'HomePageController');
$app->get('/admin', 'AdminController');
$app->get('/register', 'RegisterController');

// URL routes - to display pages
$app->get('/addapplicant', 'addApplicantController');
$app->get('/displayApplicants', 'DisplayApplicantsController');

$app->get('/displayApplicantInfo/{id}', 'GetApplicantController');
$app->get('/displayHiringPartnerPage', 'DisplayHiringPartnerPageController');
$app->get('/displayEventsPage', 'DisplayEventsPageController');

$app->get('/displayStages', 'DisplayStagesController');

// API routes
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

//Backend
$app->post('/api/login', 'LoginController');
$app->post('/api/registerUser', 'RegisterUserController');
