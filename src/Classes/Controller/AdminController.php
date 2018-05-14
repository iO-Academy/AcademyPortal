<?php

namespace Portal\Controller;

class AdminController
{
    protected $container;

    function __construct($container)
    {
        $this->container = $container;
    }

    function __invoke($request, $response, $args)
    {
        if ($_SESSION['loggedIn'] === true) {
            return $this->container->get('renderer')->render($response, 'admin.phtml', $args);
        } else {
            $_SESSION['loggedIn'] = false; 
            return $response->withRedirect('/');
        }
    }
}