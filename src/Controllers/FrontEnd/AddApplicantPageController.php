<?php

namespace Portal\Controllers\FrontEnd;

use Portal\Abstracts\Controller;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Views\PhpRenderer;

class AddApplicantPageController extends Controller
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
    public function __invoke(Request $request, Response $response, array $args)
    {
        if ($_SESSION['loggedIn'] === true) {
            return $this->renderer->render($response, 'newApplicantForm.phtml');
        }

        $_SESSION['loggedIn'] = false;
        return $response->withHeader('Location', './');
    }
}
