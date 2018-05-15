<?php

use Slim\Http\Request;
use Slim\Http\Response;


// Routes
$app->get('/', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");
    return $this->renderer->render($response, 'index.phtml', $args);
});

$app->get('/admin', 'adminControllerFactory');

// API routes: