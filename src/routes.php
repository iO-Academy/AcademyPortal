<?php

use Slim\Http\Request;
use Slim\Http\Response;

//FrontEnd
$app->get('/','HomePageController');
$app->get('/admin', 'AdminController');
$app->get('/register', 'RegisterController');
$app->get('/addEvent', function (Request $request, Response $response, array $args) {

    // Render index view
    return $this->renderer->render($response, 'addEvent.phtml', $args);
});

//Backend
$app->post('/api/login', 'LoginController');
$app->post('/api/registerUser', 'RegisterUserController');