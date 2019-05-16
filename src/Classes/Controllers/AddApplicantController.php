<?php

namespace Portal\Controllers;

use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Views\PhpRenderer;

class AddApplicantController
{
    private $renderer;

    /**
     * Will instantiate renderer.
     *
     * @param PhpRenderer $renderer
     */

    public function __construct(PhpRenderer $renderer)
    {
        $this->renderer = $renderer;
    }

    /**
     * Checks if the users are logged in or not.
     *
     * @param Request $request HTTP request
     * @param Response $response HTTP response
     * @param $args array
     *
     * @return Response will return the url output.
     */

    public function __invoke(Request $request, Response $response, $args)
    {
        if ($_SESSION['loggedIn'] === true) {
            return $this->renderer->render($response, 'addApplicant.phtml', $args);
        } else {
            $_SESSION['loggedIn'] = false;
            return $response->withRedirect('/');
        }
    }
}
