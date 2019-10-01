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
$app->get('/displayEventsPage', 'DisplayEventsController');

// API routes
$app->post('/api/saveApplicant', 'SaveApplicantController');
$app->get('/api/applicationForm', 'ApplicationFormController');
$app->post('/api/createHiringPartner', 'CreateHiringPartnerController');
$app->get('/api/getHiringPartnerInfo', 'GetHiringPartnersController');
$app->get('/api/addEvent', 'AddEventController');

//Backend
$app->post('/api/login', 'LoginController');
$app->post('/api/registerUser', 'RegisterUserController');
