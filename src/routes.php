<?php

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