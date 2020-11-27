<?php

namespace Portal\Controllers\FrontEnd;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\PhpRenderer;

class AuthenticatePageController
{
    private $renderer;

    public function __construct(PhpRenderer $renderer)
    {
        $this->renderer = $renderer;
    }

    public function __invoke(Request $request, Response $response, array $args)
    {

        $params['id'] = $args['id'];
        if (isset($_SESSION['authenticated: ' . $args['id']]) && $_SESSION['authenticated: ' . $args['id']] === true) {
            return $response->withHeader('Location', '/public/' . $args['id']);
        }

        return $this->renderer->render($response, 'authenticate.phtml', $params);
    }
}
