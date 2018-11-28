<?php
use \Slim\Http\Request as Request;
use \Slim\Http\Response as Response;

//FrontEnd
$app->get('/','HomePageController');
$app->get('/admin', 'AdminController');
$app->get('/register', 'RegisterController');
$app->get('/addPartner', function ($request, $response, $args) {
    return $this->renderer->render($response, 'addHiringPartner.phtml', $args);
});


//Backend
$app->post('/api/login', 'LoginController');
$app->post('/api/registerUser', 'RegisterUserController');

$app->post('/api/addHiringPartner', function(Request $request, Response $response, $args) {
    $returnVars = ['status'=>true];
    return $response->withJson($returnVars, 200);
});