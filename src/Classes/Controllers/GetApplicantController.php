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
use Slim\Views\PhpRenderer;
use Portal\Models\ApplicantModel;


class GetApplicantController
{
    private $applicantModel;

    /**
     * GetApplicantController constructor.
     *
     * @param PhpRenderer $renderer
     *
     * @param ApplicantModel $applicantModel
     */
    public function __construct( ApplicantModel $applicantModel)
    {
        $this->applicantModel = $applicantModel;
    }

    public function __invoke(Request $request, Response $response, array $args)
    {
        echo 'hello';


    }
}

