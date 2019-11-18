<?php

namespace Portal\Controllers;

use Portal\Models\EventModel;
use Slim\Http\Request;
use Slim\Http\Response;

class LinkHiringPartnerToEventController
{
    private $EventModel;

    public function __construct(EventModel $EventModel)
    {
        $this->EventModel = $EventModel;
    }


    public function __invoke(Request $request, Response $response, array $args) :Response
    {

    }
}
