<?php


namespace Portal\Controllers;

use Portal\Abstracts\Controller;
use Portal\Models\HiringPartnerModel;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class CompanyDetailsModalController extends Controller
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
     * @param Array $args contains company ID
     */
    public function __invoke(Request $request, Response $response, Array $args)
    {
        $id = (int) $args['id'];
        $companyDetails = $this->model->getDetailsByCompany($id);
        $contactDetails = $this->model->getContactsByCompany($id);
        $companyDetailsAndContacts = array_merge($companyDetails, $contactDetails);

        return $this->respondWithJson($response, $companyDetailsAndContacts);
    }
}
