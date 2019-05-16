<?php


namespace Portal\Controllers;

use Portal\Models\HiringPartnerModel;
use Slim\Http\Request;
use Slim\Http\Response;

class GetHiringPartnersController
{
    private $hiringPartnerModel;

    public function __construct(HiringPartnerModel $hiringPartnerModel)
    {
        $this->hiringPartnerModel = $hiringPartnerModel;
    }

    public function __invoke(Request $request, Response $response, array $args)
    {
        $data = [
            'status' => false,
            'message' => 'No hiring partners found!',
            'data' => []
        ];
        $statusCode = 400;

        try {
            $hiringPartners = $this->hiringPartnerModel->getHiringPartnes();
        } catch (\PDOException $exception) {
            $data['message'] = $exception->getMessage();
        }

        if (!empty($hiringPartners)) {
            $data = [
                'status' => true,
                'message' => 'Query Successful',
                'data' => [$hiringPartners]
            ];
            $statusCode = 200;
        }

        return $response->withJson($data, $statusCode);
    }
}
