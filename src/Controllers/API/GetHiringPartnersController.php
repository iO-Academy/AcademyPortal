<?php

namespace Portal\Controllers\API;

use Portal\Abstracts\Controller;
use Portal\Models\HiringPartnerModel;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class GetHiringPartnersController extends Controller
{
    private $hiringPartnerModel;

    public function __construct(HiringPartnerModel $hiringPartnerModel)
    {
        $this->hiringPartnerModel = $hiringPartnerModel;
    }

    /**
     * Calls a method to get all the hiring partner and send JSON back with the info
     *
     * @param Request $request HTTP request
     * @param Response $response HTTP response
     * @param array $args
     * @return Response returns JSON with hiring partner data
     */
    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $data = [
            'status' => false,
            'message' => 'No hiring partners found!',
            'data' => []
        ];
        $statusCode = 400;

        try {
            $hiringPartners = $this->hiringPartnerModel->getHiringPartners();
        } catch (\PDOException $exception) {
            $data['message'] = $exception->getMessage();
        }

        if (!empty($hiringPartners)) {
            $data = [
                'status' => true,
                'message' => 'Query Successful',
                'data' => $hiringPartners
            ];
            $statusCode = 200;
        }

        return $this->respondWithJson($response, $data, $statusCode);
    }
}
