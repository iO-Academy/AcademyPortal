<?php

namespace Portal\Controllers\API;

use Portal\Abstracts\Controller;
use Portal\Models\EventModel;
use Portal\Models\HiringPartnerModel;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class GetHiringPartnersByIdController extends Controller
{
    private HiringPartnerModel $hiringPartnerModel;
    private EventModel $eventModel;
    private $hpIdsData;
    private $hpEntities = [];

    public function __construct(HiringPartnerModel $hiringPartnerModel, EventModel $eventModel)
    {
        $this->hiringPartnerModel = $hiringPartnerModel;
        $this->eventModel = $eventModel;
    }

    /**
     * Invoke function to get all hiring partners associated with an event and returns JSON
     */
    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $id = $request->getParsedBody()['event_id'];
        $this->hpIdsData = $this->eventModel->hpIdsByEventId($id);
        foreach ($this->hpIdsData as $hpId) {
            $hiringPartner = $this->hiringPartnerModel->getHiringPartnerById($hpId['hiring_partner_id']);
            if ($hiringPartner !== false) {
                $hiringPartner['attendees'] = $hpId['people_attending'];
                array_push($this->hpEntities, $hiringPartner);
            } else {
                return $this->respondWithJson($response, ['message' => 'Database error'], 500);
            }
        }
        return $this->respondWithJson($response, $this->hpEntities);
    }
}
