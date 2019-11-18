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


// API routes
$app->post('/api/saveApplicant', 'SaveApplicantController');
$app->get('/api/applicationForm', 'ApplicationFormController');
$app->post('/api/createHiringPartner', 'CreateHiringPartnerController');
$app->get('/api/getEvents', 'GetEventsController');
$app->post('/api/addEvent', 'AddEventController');
$app->post('/api/addContact', 'AddContactController');

$app->get('/api/getHiringPartnerInfo', 'GetHiringPartnersController');
//$app->get('api/displayContactInfo/{id}', 'GetHiringPartnerContactController');
$app->get('/api/getHiringPartnerAndContactInfo/{id}', 'GetHiringPartnerContactController');


//Backend
$app->post('/api/login', 'LoginController');
$app->post('/api/registerUser', 'RegisterUserController');
