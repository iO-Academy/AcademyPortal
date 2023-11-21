<?php

namespace Portal\Controllers\FrontEnd;

use Portal\Abstracts\Controller;
use Portal\Models\RandomPasswordModel;
use Slim\Views\PhpRenderer;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class RegisterPageController extends Controller
{
    private PhpRenderer $renderer;
    private RandomPasswordModel $password;

    public function __construct(PhpRenderer $renderer, RandomPasswordModel $password)
    {
        $this->renderer = $renderer;
        $this->password = $password;
    }

    /**
     * Directs the user to the registerUser page if they have logged in, but redirects them to the index
     * if they have not.
     */
    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $args['password'] = ($this->password)();
        if (!empty($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {
            return $this->renderer->render($response, 'registerUser.phtml', $args);
        } else {
            $_SESSION['loggedIn'] = false;
            return $response->withHeader('Location', '/')->withStatus(301);
        }
    }
}
