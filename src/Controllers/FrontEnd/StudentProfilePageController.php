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
    private $renderer;
    private $applicantModel;

    /**
     * DisplayStudentPageController constructor.
     *
     * @param PhpRenderer $renderer
     *
     * @param ApplicantModel $applicantModel
     */
    public function __construct(PhpRenderer $renderer, ApplicantModel $applicantModel)
    {
        $this->renderer = $renderer;
        $this->applicantModel = $applicantModel;
    }

    /**
     * Renders applicant data on the front end in studentProfile.phtml.
     *
     * @param Request $request
     * @param Response $response
     * @param array $args
     *
     * @return \Psr\Http\Message\ResponseInterface.
     */
    public function __invoke(Request $request, Response $response, array $args)
    {
        $params['id'] = $args['id'];
        $params['applicant'] = $this->applicantModel->getApplicantById($params['id']);
        if ($request->getParsedBody()['password']) {
            if ($request->getParsedBody()['password'] === 'Saskia') { ///remove dummy test password Saskia with the data base password
                $_SESSION['studentLogin'] = true;
            } else {
                $_SESSION['studentLogin'] = false;
            }

            if ($_SESSION['studentLogin']) {
                return $this->renderer->render($response, 'studentProfile.phtml', $params);
            } else {
                return $this->renderer->render($response, 'studentLogin.phtml', $params);
            }
        }
    }
}
