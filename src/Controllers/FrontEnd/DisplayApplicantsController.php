<?php

namespace Portal\Controllers\FrontEnd;

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
     * Renders applicant data on the front end in applicants.phtml.
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
            $params['sort'] = $request->getQueryParams()['sort'] ?? '';
            $params['cohortId'] = $request->getQueryParams()['cohortId'] ?? '%';
            $params['stageId'] = $request->getQueryParams()['stageId'] ?? '%';
            $params['page'] = $request->getQueryParams()['page'] ?? '1';

            if (isset($params['cohortId']) && $params['cohortId'] == 'all') {
                $params['cohortId'] = '%';
            }
            if (isset($params['stageId']) && $params['stageId'] == 'all') {
                $params['stageId'] = '%';
            }

            $params['count'] = $this->applicantModel->countPaginationPages($params['stageId'], $params['cohortId']);

            $params['data'] = $this->applicantModel
                ->getApplicants($params['stageId'], $params['cohortId'], $params['sort'], $params['page']);
            return $this->renderer->render($response, 'applicants.phtml', $params);
        }
        return $response->withHeader('Location', '/');
    }
}
