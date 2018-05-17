<?php

namespace Portal\Controllers;

use Portal\Models\RandomPasswordModel;
use Slim\Views\PhpRenderer;

class RegisterController
{
    private $renderer;
    private $password;

    function __construct(PhpRenderer $renderer, $password)
    {
        $this->renderer = $renderer;
        $this->password = $password;
    }

    function __invoke($request, $response, $args)
    {
        $args['password'] = $this->password;
        if ($_SESSION['loggedIn'] === true) {
            return $this->renderer->render($response, 'registerUser.phtml', $args);
        } else {
            $_SESSION['loggedIn'] = false;
            return $response->withRedirect('/');
        }
    }
}
