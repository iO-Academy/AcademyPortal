<?php

namespace Portal\Controllers\FrontEnd;

use Portal\Abstracts\Controller;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Views\PhpRenderer;
use Portal\Models\ApplicantModel;
use Portal\Models\ApplicationFormModel;

class StudentProfilePageController extends Controller
{
    private PhpRenderer $renderer;
    private ApplicantModel $applicantModel;

    /**
     * DisplayStudentPageController constructor.
     */
    public function __construct(PhpRenderer $renderer, ApplicantModel $applicantModel)
    {
        $this->renderer = $renderer;
        $this->applicantModel = $applicantModel;
    }

    /**
     * Renders applicant data on the front end in studentProfile.phtml.
     */
    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $params['id'] = $args['id'];
        $params['applicant'] = $this->applicantModel->getApplicantById($params['id']);

        if ((!$params['applicant']) || !$params['applicant']->isStudentStage()) {
             $response->withStatus(404);
             return $this->renderer->render($response, '404.phtml');
        } else {
            if (!empty($request->getParsedBody()['password'])) {
                $hashPassword = $this->applicantModel->getApplicantPassword($params['id']);
                $password = $request->getParsedBody()['password'];

                if (password_verify($password, $hashPassword)) {
                    $_SESSION['studentLogin'] = true;
                    $_SESSION['studentId'] = $params['id'];
                } else {
                    unset($_SESSION['studentLogin']);
                    unset($_SESSION['studentId']);
                    $params['error'] = 'Invalid password';
                }
            }
            if (
                !empty($_SESSION['studentLogin']) &&
                $_SESSION['studentLogin'] &&
                $_SESSION['studentId'] == $params['id'] ||
                !empty($_SESSION['loggedIn']) &&
                $_SESSION['loggedIn']
            ) {
                return $this->renderer->render($response, 'studentProfile.phtml', $params);
            } else {
                return $this->renderer->render($response, 'studentLogin.phtml', $params);
            }
        }
    }
}
