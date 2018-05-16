<?php

namespace Portal\Controller;

use Slim\Views\PhpRenderer;

class AdminController
{
    private $renderer;

    function __construct(PhpRenderer $renderer)
    {
        $this->renderer = $renderer;
    }

    function __invoke($request, $response, $args)
    {
        if ($_SESSION['loggedIn'] === true) {
            return $this->renderer->render($response, 'admin.phtml', $args);
        } else {
            $_SESSION['loggedIn'] = false;
            return $response->withRedirect('/');
        }
    }
}