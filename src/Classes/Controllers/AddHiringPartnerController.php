<?php

namespace Portal\Controllers;


use Portal\Entities\HiringPartnerEntity;
use Portal\Models\HiringPartnerModel;
use Slim\Http\Request;
use Slim\Http\Response;

class AddHiringPartnerController
{
    private $hiringPartnerModel;

    /**
     * AddHiringPartnerController constructor
     *
     * @param HiringPartnerModel $hiringPartnerModel is used to insert a new hiring partner into the db.
     */
    public function __construct(HiringPartnerModel $hiringPartnerModel)
    {
        $this->hiringPartnerModel = $hiringPartnerModel;
    }

    /**
     * Receives data to create a new hiring partner, sends it to the hiring partner entity for validation
     * and, once validated, inserts the data into the database. A message is returned for success or failure of this.
     *
     * @param Request $request is the http request from /api/addHiringPartner with new hiring partner data.
     * @param Response $response is the http response
     *
     * @return Response JSON contains (array) $data and (int) $statusCode, indicating success or failure information.
     */
    public function __invoke(Request $request, Response $response)
    {

        $data = [
            'success' => false,
            'msg' => 'Hiring partner not registered.',
            'data' => []
        ];
        $statusCode = 406;

        $newHiringPartnerData = $request->getParsedBody();

        try {
            $hiringPartnerEntity = new HiringPartnerEntity(
                $newHiringPartnerData['companyName'],
                $newHiringPartnerData['size'],
                $newHiringPartnerData['techStack'],
                $newHiringPartnerData['postcode'],
                $newHiringPartnerData['phoneNo'],
                $newHiringPartnerData['url']
            );
        } catch (\Error $e) {
            return $response->withJson($data, $statusCode);
        }

        $successfulNewHiringPartner = $this->hiringPartnerModel->insertNewHiringPartnerToDb($hiringPartnerEntity);

        if ($successfulNewHiringPartner) {
            $data = [
                'success' => $successfulNewHiringPartner,
                'msg' => 'New hiring partner ' . $newHiringPartnerData['companyName'] . ' added to the database',
                'data' => []
            ];
            $statusCode = 200;
        }
        return $response->withJson($data, $statusCode);
    }
}
