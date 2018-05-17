<?php
/**
 * Created by PhpStorm.
 * User: academy
 * Date: 17/05/2018
 * Time: 10:29
 */

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