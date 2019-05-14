<?php

namespace Portal\Controllers;

use Slim\Http\Request;
use Slim\Http\Response;
use Portal\Models\HiringPartnerModel;

class GetCompanySizeController
{
    protected $hiringPartnerModel;

    public function __construct(HiringPartnerModel $hiringPartnerModel)
    {
        $this->hiringPartnerModel = $hiringPartnerModel;
    }

    /**
     * Gets all the company sizes and send a response as a JSON
     *
     * @param Request $request HTTP request
     * @param Response $response HTTP response
     * @param array $args
     *
     * @return Response Json data
     */
    public function __invoke(Request $request, Response $response, array $args)
    {
        $data = [
            'success' => false,
            'msg' => 'No companies taken',
            'data' => []
        ];
        $statusCode = 401;

        $sizes = $this->hiringPartnerModel->getCompanySize();

        if(!empty($sizes)) {
            $data = ['success' => true,
                'msg' => 'Companies taken',
                'data' => [$sizes]
            ];
            $statusCode = 200;
        }
        return $response->withJson($data, $statusCode);
    }
}
