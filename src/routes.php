<?php

//FrontEnd
$app->get('/','HomePageController');
$app->get('/admin', 'AdminController');

//Backend
$app->post('/api/login', 'LoginController');

