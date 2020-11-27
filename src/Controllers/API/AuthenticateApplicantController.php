<?php

namespace Portal\Controllers\API;

use Portal\Models\ApplicantModel;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class AuthenticateApplicantController
{
    private $applicantModel;

    /**
     * Instantiates login controller.
     * LoginController constructor.
     *
     * @param UserModel $userModel userModel object dependency
     */
    public function __construct(ApplicantModel $applicantModel)
    {
        $this->applicantModel = $applicantModel;
    }

    /**
     *
     *
     * @param Request $request HTTP request
     * @param Response $response HTTP response
     * @param array $args The arguments array

     *
     * @return string
     */
    public function __invoke(Request $request, Response $response, array $args) : Response
    {
        $_SESSION['authenticated'] = false;
        $_SESSION['authenticateId'] = null;

        $id = $request->getParsedBody()['id'];
        $password = $request->getParsedBody()['password'];
        $applicant = $this->applicantModel->getApplicantById($id);
        $hash = $applicant->getPassword();
        if (password_verify($password, $hash)) {
            $_SESSION['authenticated'] = true;
            $_SESSION['authenticateId'] = $id;
            return $response->withHeader('Location', '/public/' . $id);
        }

        return $response->withHeader('Location', '/authenticate/' . $id);
    }
}
