<?php
use \Slim\Http\Request as Request;
use \Slim\Http\Response as Response;

//FrontEnd
$app->get('/','HomePageController');
$app->get('/admin', 'AdminController');
$app->get('/register', 'RegisterController');
$app->get('/addHiringPartner', function ($request, $response, $args) {
    if ($_SESSION['loggedIn']) {
        return $this->renderer->render($response, 'addHiringPartner.phtml', $args);
    } else {
        return $response->withStatus(401);
    }
});


//Backend
$app->post('/api/login', 'LoginController');
$app->post('/api/registerUser', 'RegisterUserController');

$app->post('/api/addHiringPartner', function(Request $request, Response $response, $args) {
    $returnVars = ['status'=>true];
    return $response->withJson($returnVars, 200);
});