<?php

use Slim\Http\Request;
use Slim\Http\Response;

//$app->get('/', function (Request $request, Response $response, array $args) {
//    $this->logger->info("Slim-Skeleton '/' route");
//    return $this->renderer->render($response, 'index.phtml', $args);
//});

//FrontEnd
$app->get('/','HomePageController');
$app->get('/admin', 'AdminController');

//Backend
$app->post('/api/login', 'LoginController');

