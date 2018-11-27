<?php

namespace Portal\Controllers;


use Portal\Models\HiringPartnerModel;
use Slim\Http\Request;
use Slim\Http\Response;

class AddHiringPartnerController
{
    private $hiringPartnerModel;

    /**
     * AddHiringPartnerController constructor instantiates the AddHiringPartnerController
     * @param $hiringPartnerModel
     */
    public function __construct(HiringPartnerModel $hiringPartnerModel)
    {
        $this->hiringPartnerModel = $hiringPartnerModel;
    }

    public function __invoke(Request $request, Response $response)
    {
        $this->hiringPartnerModel->insertNewHiringPartnerToDb();
    }
}