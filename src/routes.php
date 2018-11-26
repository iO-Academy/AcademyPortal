<?php
use \Slim\Http\Request as Request;
use \Slim\Http\Response as Response;

//FrontEnd
$app->get('/','HomePageController');
$app->get('/admin', 'AdminController');
$app->get('/register', 'RegisterController');

$app->get('/test', function(Request $request, Response $response, $args) {
    return $this->renderer->render($response, 'test.phtml', $args);
});

//Backend
$app->post('/api/login', 'LoginController');
$app->post('/api/registerUser', 'RegisterUserController');

$app->post('/api/addHiringPartner', function(Request $request, Response $response, $args) {
    $parsedBody = $request->getParsedBody();
    $args['stuff'] = $parsedBody;
    return $response->withJson($args, 200);
});