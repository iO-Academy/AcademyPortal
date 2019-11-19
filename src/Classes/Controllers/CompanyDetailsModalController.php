<?php


namespace Portal\Controllers;


use Slim\Http\Request;
use Slim\Http\Response;

class CompanyDetailsModalController
{
    private $model;
    private $view;

    /**
     * CompanyDetailsModalController constructor.
     * @param $model
     * @param $view
     */
    public function __construct($model, $view)
    {
        $this->model = $model;
        $this->view = $view;
    }


    public function __invoke(Request $request, Response $response, $args)
    {
        $id = (int) $args['id'];
        $companyDetails = $this->model->getDetailsByCompany($id);
        $contactDetails = $this->model->getContactsByCompany($id);
        $companyDetailsAndContacts = array_merge($companyDetails, $contactDetails);
        $this->view->render($response, 'companyDetailsModal.phtml', ['companyInfo' => $companyDetailsAndContacts]);
    }

}