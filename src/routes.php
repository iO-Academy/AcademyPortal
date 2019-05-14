<?php

//FrontEnd
$app->get('/','HomePageController');
$app->get('/admin', 'AdminController');
$app->get('/register', 'RegisterController');

// URL routes - to display pages
$app->get('/addapplicant', 'addApplicantController');
$app->get('/displayApplicants', 'DisplayApplicantsController');
$app->get('/displayHiringPartnerPage', 'DisplayHiringPartnerPageController');

// API routes
$app->post('/api/saveApplicant', 'SaveApplicantController');
$app->get('/api/applicationForm', 'ApplicationFormController');

//Backend
$app->post('/api/login', 'LoginController');
$app->post('/api/registerUser', 'RegisterUserController');

