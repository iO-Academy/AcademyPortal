<?php

namespace Portal\Controllers;

use Portal\Entities\HiringPartnerEntity;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Views\PhpRenderer;
use Portal\Models\HiringPartnerModel;

class CreateHiringPartnerContactController
{
    public $hiringPartnerModel;
    public $renderer;

    /**
     * CreateHiringPartnerContactController constructor.
     *
     * @param $hiringPartnerModel
     */
    public function __construct(HiringPartnerModel $hiringPartnerModel)
    {
        $this->hiringPartnerModel = $hiringPartnerModel;
    }


    /**
     * Uses hiring partner model to add hiring partner contacts with a try/catch for any errors.
     *
     * @param Request $request HTTP request
     * @param Response $response HTTP response
     * @param array $args
     *
     * @return Response HTTP response with redirect
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
            $hiringPartnerContact = $this->hiringPartnerModel->createNewHiringPartner(
                $newHiringPartnerContact['name'],
                $newHiringPartnerContact['email'],
                $newHiringPartnerContact['jobTitle'],
                $newHiringPartnerContact['phoneNumber'],
                $newHiringPartnerContact['companyId']
            );
            if(!empty($hiringPartnerContact) && $hiringPartnerContact instanceof HiringPartnerContactEntity) {
                $result = $this->hiringPartnerModel->addHiringPartner($hiringPartnerContact);
            }
        } catch (\Exception $exception) {
            $data['message'] = $exception->getMessage();
        }

        if (isset($result) && $result) {
            $data = [
                'success' => true,
                'message' => 'Hiring Partner Added to the db',
                'data' => []
            ];
            $statusCode = 200;
        }
        return $response->withJson($data, $statusCode);
    }
}