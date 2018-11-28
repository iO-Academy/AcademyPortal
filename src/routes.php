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
$app->post('/api/addEvent', function (Request $request, Response $response, array $args) {
    $data = $request->getParsedBody();
    return $response->withJson(['data' => $data, 'success' => true]);
    // $result = $this->Model->save($data);
    // if ($result) {
    //     return $response->withJson(['success' => true]);
    // } else {
    //     return $response->withJson(['success' => false], 500);
    // }
});