<?php

namespace Portal\Controllers\FrontEnd;

use Portal\Abstracts\Controller;
use Slim\Views\PhpRenderer;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class RegisterPageController extends Controller
{
    private $renderer;
    private $password;


    /**
     * Constructs an instance of register controller with the given renderer and password.
     *
     * @param PhpRenderer $renderer
     * @param string $password
     */
    public function __construct(PhpRenderer $renderer, string $password)
    {
        $this->renderer = $renderer;
        $this->password = $password;
    }

    /**
     * Directs the user to the registerUser page if they have logged in, but redirects them to the index
     * if they have not.
     *
     * @param Request $request
     * @param Response $response
     * @param array $args
     *
     * @return \Psr\Http\Message\ResponseInterface|Response.
     */
    public function __invoke(Request $request, Response $response, array $args)
    {
        $args['password'] = $this->password;
        if ($_SESSION['loggedIn'] === true) {
            return $this->renderer->render($response, 'registerUser.phtml', $args);
        } else {
            $_SESSION['loggedIn'] = false;
            return $response->withRedirect('./');
        }
    }
}
