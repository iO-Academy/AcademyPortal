<?php

//FrontEnd
$app->get('/','HomePageController');
$app->get('/admin', 'AdminController');
$app->get('/register', 'RegisterController');



// API routes
$app->post('/api/login', 'LoginController');
$app->post('/api/registerUser', 'RegisterUserController');

