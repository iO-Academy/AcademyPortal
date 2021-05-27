<?php

namespace Portal\Controllers\API;

use Portal\Abstracts\Controller;
use Portal\Models\ApplicantModel;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Portal\Models\RandomPasswordModel;

class StudentPasswordModalController extends Controller
{
    private $password;
    private $applicantModel;

    /**
     * Constructs an instance of StudentPasswordModalController with the given renderer and password.
     *
     * @param string $password
     * @param ApplicantModel $applicantModel
     */
    public function __construct(RandomPasswordModel $password, ApplicantModel $applicantModel)
    {
        $this->password = $password;
        $this->applicantModel = $applicantModel;
    }

    public function __invoke(Request $request, Response $response, array $args)
    {
        $id = $args['id'];
        $hashedPassword = password_hash(($this->password), PASSWORD_DEFAULT);
        $this->applicantModel->addApplicantPassword($id, $hashedPassword);
        return $this->respondWithJson($response, ['password' => $this->password]);
    }
}


// fetch will send it to a URL which triggers this route and controller
// triggered by JS
