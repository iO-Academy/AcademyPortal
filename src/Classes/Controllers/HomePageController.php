<?php

namespace Portal\Controllers;

use Slim\Views\PhpRenderer;

class HomePageController
{
    private $renderer;

    function __construct(PhpRenderer $renderer)
    {
        $this->renderer = $renderer;
    }

    function __invoke($request, $response, $args)
    {
        return $this->renderer->render($response, 'index.phtml', $args);
    }

}