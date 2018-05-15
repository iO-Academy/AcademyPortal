<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes

$app->get('/', function (Request $request, Response $response, array $args) {

    $args['farm'] = 'hello';
    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});


$app->post('/api/login', function (Request $request, Response $response, array $args) {

    $data = ['success' => false, 'message' => 'Nice one yo', 'data' => []];
    $user = $request->getParsedBody();
    $data['data'] = $user;
    return $response->withJson($data, 200);

});