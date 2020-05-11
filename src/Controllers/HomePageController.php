<?php

namespace Portal\Controllers;

use Portal\Abstracts\Controller;
use Slim\Views\PhpRenderer;

class HomePageController extends Controller
{
    private $renderer;

    public function __construct(PhpRenderer $renderer)
    {
        $this->renderer = $renderer;
    }

    public function __invoke($request, $response, $args)
    {
        return $this->renderer->render($response, 'index.phtml', $args);
    }
}
