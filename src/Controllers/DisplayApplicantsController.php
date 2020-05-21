<?php

namespace Portal\Controllers;

use Portal\Abstracts\Controller;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Views\PhpRenderer;
use Portal\Models\ApplicantModel;

class DisplayApplicantsController extends Controller
{
    private $renderer;
    private $applicantModel;

    /**
     * DisplayApplicantsController constructor.
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
     * Renders applicant data on the front end in displayApplicants.phtml.
     *
     * @param Request $request
     * @param Response $response
     * @param array $args
     *
     * @return \Psr\Http\Message\ResponseInterface.
     */
    public function __invoke(Request $request, Response $response, array $args)
    {
        if ($_SESSION['loggedIn'] === true) {
            $params = [];
            $params['sort'] = $request->getQueryParams()['sort'] ?? '';

            $params['data'] = $this->applicantModel->getAllApplicants($params['sort']);

            return $this->renderer->render($response, 'displayApplicants.phtml', $params);
        }
        return $response->withStatus(401);
    }
}
