<?php


namespace Portal\Controllers;


use Portal\Models\HiringPartnerModel;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Views\PhpRenderer;

class GetHiringPartnerContactController
{
    private $view;
    private $model;

    /**
     * GetHiringPartnerContactController constructor.
     * @param $view
     */
    public function __construct(PhpRenderer $view, HiringPartnerModel $model)
    {
        $this->view = $view;
        $this->model = $model;
    }

    public function __invoke(Request $request, Response $response, $args)
    {
        $id = $args;
        var_dump($id);
        if (is_numeric($id) && !empty($id)) {
            $contacts = $this->model->getContactsForCompany($id);
            return $response->withJson($contacts);
        } else {
            return $response->withStatus(404);
        }
    }
}