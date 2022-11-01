<?php

namespace Portal\Controllers\FrontEnd;

use Portal\Abstracts\Controller;
use Portal\Models\ApplicantModel;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Views\PhpRenderer;

class TeamPickerPageController extends Controller
{
    private PhpRenderer $renderer;

    public function __construct(PhpRenderer $renderer)
    {
        $this->renderer = $renderer;
    }

    public function __invoke(Request $request, Response $response, array $args): Response
    {
        if ($_SESSION['loggedIn'] === true) {
            return $this->renderer->render($response, 'teamPicker.phtml', $args);
        } else {
            return $response->withHeader('Location', './');
        }
    }
}
