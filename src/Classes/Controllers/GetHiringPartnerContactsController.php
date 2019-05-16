<?php

namespace Portal\Controllers;

use http\Env\Response;
use Portal\Models\HiringPartnerContactsModel;

class GetHiringPartnerContactsController
{
    private $hiringPartnerContactsModel;

    public function __construct(HiringPartnerContactsModel $hiringPartnerContactsModel)
    {
        $this->hiringPartnerContactsModel = $hiringPartnerContactsModel;
    }

    /**
     * Calls a method to get all the hiring partner contacts and send JSON back with the data
     *
     * @param Request $request HTTP request
     * @param Response $response HTTP response
     * @param array $args
     *
     * @return Response returns JSON with hiring partner contact data
     */
    public function __invoke(Request $request, Response $response, array $args) :Response
    {
        {
            $data = [
                'status' => false,
                'message' => 'No hiring partner contacts found!',
                'data' => []
            ];
            $statusCode = 400;

            try {
                $hiringPartnerContacts = $this->hiringPartnerContactsModel->getHiringPartnerContactById();
            } catch (\PDOException $exception) {
                $data['message'] = $exception->getMessage();
            }

            if (!empty($hiringPartnerContacts)) {
                $data = [
                    'status' => true,
                    'message' => 'Query Successful',
                    'data' => $hiringPartnerContacts
                ];
                $statusCode = 200;
            }

            return $response->withJson($data, $statusCode);
        }

    }
}