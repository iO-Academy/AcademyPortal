<?php
namespace Portal\Controllers;
use Prophecy\Argument;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Views\PhpRenderer;



class EventListController
{
    private $renderer;
    public function __construct(PhpRenderer $renderer)
    {
        $this->renderer = $renderer;
    }

    public function __invoke(Request $request, Response $response, Argument $args)
    {
        return $this->renderer->render($response, 'EventList.phtml', $args);

    }

}