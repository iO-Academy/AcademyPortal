<?php

namespace Portal\Controllers\API;

use Portal\Abstracts\Controller;
use Portal\Models\ApplicantModel;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class AddAptitudeScoresController extends Controller
{
    private $applicantModel;

    /**
     * Instantiates AddApplicantPageController.
     *
     * @param ApplicantModel $applicantModel userModel object dependency
     */
    public function __construct(ApplicantModel $applicantModel)
    {
        $this->applicantModel = $applicantModel;
    }

    public function __invoke(Request $request, Response $response, array $args)
    {

        $data = ['success' => false, 'msg' => 'Aptitude Score Not Added'];
        $statusCode = 500;
        $aptitudeData = $request->getParsedBody();
        $email = $aptitudeData['email'];

        if ($aptitudeData === null) {
            return $response->withStatus(400);
        }
        if ($this->applicantModel->getApplicantByEmail) {

        }
    }
}