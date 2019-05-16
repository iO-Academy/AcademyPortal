<?php

namespace Portal\Controllers;

use Portal\Entities\HiringPartnerContactsEntity;
use Slim\Http\Request;
use Slim\Http\Response;
use Portal\Models\HiringPartnerContactsModel;

class CreateHiringPartnerContactController
{
    public $hiringPartnerContactsModel;

    /**
     * CreateHiringPartnerContactController constructor.
     *
     * @param $hiringPartnerModel
     */
    public function __construct(HiringPartnerContactsModel $hiringPartnerContactsModel)
    {
        $this->hiringPartnerContactsModel = $hiringPartnerContactsModel;
    }


    /**
     * Uses hiring partner model to add hiring partner contacts with a try/catch for any errors.
     *
     * @param Request $request HTTP request
     * @param Response $response HTTP response
     * @param array $args
     *
     * @return Response responds with JSON
     */
    public function __invoke(Request $request, Response $response, array $args)
    {
        $newHiringPartnerContact = $request->getParsedBody();
        $data = [
            'success' => false,
            'message' => 'Error!',
            'data' => []
        ];
        $statusCode = 400;

        try {
            $hiringPartnerContact = $this->hiringPartnerModel->createHiringPartnerContact(
                $newHiringPartnerContact['name'],
                $newHiringPartnerContact['email'],
                $newHiringPartnerContact['jobTitle'],
                $newHiringPartnerContact['phoneNumber'],
                $newHiringPartnerContact['companyId']
            );
            if(!empty($hiringPartnerContact) && $hiringPartnerContact instanceof HiringPartnerContactEntity) {
                $result = $this->hiringPartnerModel->createHiringPartnerContact($hiringPartnerContact);
            }
        } catch (\Exception $exception) {
            $data['message'] = $exception->getMessage();
        }

        if (isset($result) && $result) {
            $data = [
                'success' => true,
                'message' => 'Contact added to the db',
                'data' => []
            ];
            $statusCode = 200;
        }
        return $response->withJson($data, $statusCode);
    }
}