<?php

namespace Portal\Controllers\API;

use Portal\Abstracts\Controller;
use Portal\Models\HiringPartnerModel;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class GetCompanyDetailsModalController extends Controller
{
    private $model;

    /**
     * GetCompanyDetailsModalController constructor.
     * @param $model
     * @param $view
     */
    public function __construct(HiringPartnerModel $model)
    {
        $this->model = $model;
    }

    /**
     * Combine company details and company contact details into a single array and send to modal
     * @param Request $request
     * @param Response $response
     * @param array $args contains company ID
     */
    public function __invoke(Request $request, Response $response, array $args)
    {
        try {
            $id = (int)$args['id'];
            $data['data']['company'] = $this->model->getDetailsByCompany($id);
            $data['data']['contacts'] = $this->model->getContactsByCompany($id);
            $data['success'] = true;
            $data['message'] = 'Company details found.';
        } catch (\Exception $e) {
            $data['success'] = false;
            $data['message'] = $e->getMessage();
            $data['data'] = [];
        }
        return $this->respondWithJson($response, $data);
    }
}
