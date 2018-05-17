<?php

use Slim\Http\Request;
use Slim\Http\Response;

//FrontEnd
$app->get('/','HomePageController');
$app->get('/admin', 'AdminController');

//Backend
$app->post('/api/login', 'LoginController');

