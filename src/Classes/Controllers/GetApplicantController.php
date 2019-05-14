<?php
/**
 * Created by PhpStorm.
 * User: academy
 * Date: 2019-05-13
 * Time: 15:45
 */

namespace Portal\Controllers;

use \Slim\Http\Request as Request;
use \Slim\Http\Response as Response;
use Portal\Models\ApplicantModel;


class GetApplicantController
{
    private $applicantModel;

    /**
     * GetApplicantController constructor.
     *
     * @param ApplicantModel $applicantModel
     */
    public function __construct(ApplicantModel $applicantModel)
    {
        $this->applicantModel = $applicantModel;
    }

    public function __invoke(Request $request, Response $response, array $args)
    {
        $id = $args['id'];

        $applicant = $this->applicantModel->getApplicantById($id);

       //var_dump($applicant);

       return $response->withJson($applicant);
    }
}

