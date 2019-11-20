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

    private $hpIdsData;

    private $hpEntities = [];

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
     * Invoke function to get all hiring partners associated with an event and returns JSON
     *
     * @param Request $request
     *
     * @param Response $response
     *
     * @param $args
     *
     * @return Response
     */
    public function __invoke(Request $request, Response $response, $args) :Response
    {
        $id = $request->getParsedBodyParam('event_id');
        $this->hpIdsData = $this->event->hpIdsByEventId($id);
        if ($this->hpIdsData['success']){
            foreach ($this->hpIdsData['hpIds'] as $index => $hpIds){
                foreach ($hpIds as $hpId) {
                    $getHiringPartnerIdData = $this->model->getHiringPartnerById($hpId);
                    if ($getHiringPartnerIdData['success']){
                        $hpEntity = $getHiringPartnerIdData['entity'];
                        $hpEntity['attendees'] = $this->hpIdsData['attendees'][$index]['people_attending'];
                        array_push($this->hpEntities, $hpEntity);
                    } else {
                        return $response->withJson(['message' => 'Database error'], 500);
                    }
                }
            }
            return $response->withJson($this->hpEntities, 200);
        } else {
            return $response->withJson(['message' => 'Database error'], 500);
        }
    }
}