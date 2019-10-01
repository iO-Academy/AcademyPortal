<?php

namespace Portal\Controllers;

use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Views\PhpRenderer;
use Portal\Models\EventModel;

class AddApplicantController
{
    private $eventModel;

    /**
     * AddApplicantController Constructor
     *
     * @param EventModel $eventModel
     */
    public function __construct(EventModel  $eventModel)
    {
        $this->eventModel = $eventModel;
    }

    public function __invoke(Request $request, Response $response, array $args)
    {
        return $response->withJson(['hey' => 'there']);
    }
}
