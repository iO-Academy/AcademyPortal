<?php

namespace Portal\Controllers;

use Slim\Views\PhpRenderer;
use \Slim\Http\Request as Request;
use \Slim\Http\Response as Response;

class RegisterController
{
    private $renderer;
    private $password;

    function __construct(PhpRenderer $renderer,string $password)
    {
        $this->renderer = $renderer;
        $this->password = $password;
    }

    function __invoke(Request $request,Response $response,array $args)
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
