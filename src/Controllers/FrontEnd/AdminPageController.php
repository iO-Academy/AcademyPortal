<?php

namespace Portal\Controllers\FrontEnd;

use Portal\Abstracts\Controller;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Views\PhpRenderer;

class AdminPageController extends Controller
{
    private $renderer;

    /**
     * AdminPageController constructor.
     * Instantiates admin controller.
     *
     * @param PhpRenderer $renderer
     */
    public function __construct(PhpRenderer $renderer)
    {
        $this->renderer = $renderer;
    }

    /**
     * Checks if the user is admin or not and if true let them into admin page, if false redirect them back.
     *
     * @param Request $request via HTTP request
     * @param Response $response HTTP response
     * @param array $args
     *
     * @return \Psr\Http\Message\ResponseInterface|Response.
     */
    public function __invoke(Request $request, Response $response, array $args)
    {
        if ($_SESSION['loggedIn'] === true) {
            return $this->renderer->render($response, 'admin.phtml');
        }
        $_SESSION['loggedIn'] = false;
        return $response->withHeader('Location', './')->withStatus(302);
    }
}
