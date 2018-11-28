<?php

namespace Portal\Controllers;

use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Views\PhpRenderer;

class AdminController
{
    private $renderer;

    /**
     * AdminController constructor.
     * Instantiates admin controller.
     *
     * @param PhpRenderer $renderer
     */
    function __construct(PhpRenderer $renderer)
    {
        $this->renderer = $renderer;
    }

    /**
     * Checks if the user is admin or not and if true let them into admin page, if false redirect them back.
     *
     * @param Request $request via HTTP request.
     * @param Response $response HTTP response.
     * @param array $args
     *
     * @return \Psr\Http\Message\ResponseInterface|Response
     */
    function __invoke(Request $request, Response $response, $args)
    {
        if ($_SESSION['loggedIn'] === true) {
            return $this->renderer->render($response, 'admin.phtml', $args);
        } else {
            $_SESSION['loggedIn'] = false;
            return $response->withRedirect('/');
        }
    }
}
