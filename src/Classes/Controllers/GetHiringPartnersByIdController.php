<?php

namespace Portal\Controllers;

use Portal\Models\EventModel;
use Portal\Models\HiringPartnerModel;
use Slim\Http\Request;
use Slim\Http\Response;

class GetHiringPartnersByIdController
{
    /**
     * @var HiringPartnerModel created by constructor
     */
    private $model;

    /**
     * @var EventModel created by constructor
     */
    private $event;

    /**
     * GetHiringPartnersByIdController constructor to populate the model and event properties in this class.
     *
     * @param HiringPartnerModel $model
     *
     * @param EventModel $event
     */
    public function __construct(HiringPartnerModel $model, EventModel $event)
    {
        $this->model = $model;
        $this->event = $event;
    }

    /**
     * @param Request $request from eventPage.js
     *
     * @param Response $response to eventPage.js
     *
     * @param $args
     */
    public function __invoke(Request $request, Response $response, $args)
    {
        $id = $request->getParsedBodyParam('event_id');
        $this->event->hpIdsByEventId($id);
    }
}