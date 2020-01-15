<?php
declare(strict_types=1);

use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    //Frontend
    $app->get('/', 'HomePageController');
    $app->get('/admin', 'AdminController');
    $app->get('/register', 'RegisterController');

    //Backend
    $app->post('/api/login', 'LoginController');
    $app->post('/api/registerUser', 'RegisterUserController');

};
