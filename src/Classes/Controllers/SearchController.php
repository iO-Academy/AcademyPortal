<?php

namespace Portal\Controllers;


use \Slim\Http\Request;
use Slim\Http\Response;

class SearchController
{
    private $applicantModel;

    public function __construct(ApplicantModel $applicantModel)
    {
        $this->applicantModel = $applicantModel;
    }

    public function __invoke(Request $request, Response $response)
    {
        
    }
}