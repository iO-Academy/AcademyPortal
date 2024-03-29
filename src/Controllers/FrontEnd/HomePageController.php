<?php

namespace Portal\Controllers\FrontEnd;

use Portal\Abstracts\Controller;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\PhpRenderer;

class HomePageController extends Controller
{
    private PhpRenderer $renderer;

    public function __construct(PhpRenderer $renderer)
    {
        $this->renderer = $renderer;
    }

    public function __invoke(Request $request, Response $response, array $args): Response
    {
        if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']) {
            return $response->withHeader('Location', './admin')->withStatus(301);
        }
        return $this->renderer->render($response, 'login.phtml', $args);
    }
}
