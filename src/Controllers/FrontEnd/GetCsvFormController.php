<?php

namespace Portal\Controllers\FrontEnd;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\PhpRenderer;
use Portal\Abstracts\Controller;

class GetCsvFormController extends Controller
{
    private PhpRenderer $renderer;

    public function __construct(PhpRenderer $renderer)
    {
        $this->renderer = $renderer;
    }

    public function __invoke(Request $request, Response $response, array $args): Response
    {
        return $this->renderer->render($response, 'csvUpload.phtml');
    }
}
