<?php

//FrontEnd
$app->get('/','HomePageController');
$app->get('/admin', 'AdminController');
$app->get('/register', 'RegisterController');

//Backend
$app->post('/api/login', 'LoginController');
$app->post('/api/registerUser', 'RegisterUserController');
$app->post('/api/addEvent', 'AddEventController');