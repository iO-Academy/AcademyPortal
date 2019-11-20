<?php


namespace Portal\Controllers;

use Portal\Models\HiringPartnerModel;
use Slim\Http\Request;
use Slim\Http\Response;

class CompanyDetailsModalController
{
    private $model;

    /**
     * CompanyDetailsModalController constructor.
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
     * @param $args contains company ID
     */
    public function __invoke(Request $request, Response $response, $args)
    {
        $id = (int) $args['id'];
        $companyDetails = $this->model->getDetailsByCompany($id);
        $contactDetails = $this->model->getContactsByCompany($id);
        $companyDetailsAndContacts = array_merge($companyDetails, $contactDetails);
        return $response->withJson($companyDetailsAndContacts);
    }
}
