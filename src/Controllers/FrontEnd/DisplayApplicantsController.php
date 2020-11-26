<?php

namespace Portal\Controllers\FrontEnd;

use Portal\Abstracts\Controller;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Views\PhpRenderer;
use Portal\Models\ApplicantModel;
use Portal\Models\StageModel;

class DisplayApplicantsController extends Controller
{
    private $renderer;
    private $applicantModel;
    private $stageModel;

    /**
     * DisplayApplicantsController constructor.
     *
     * @param PhpRenderer $renderer
     *
     * @param StageModel $stageModel
     * @param ApplicantModel $applicantModel
     */
    public function __construct(PhpRenderer $renderer, StageModel $stageModel, ApplicantModel $applicantModel)
    {
        $this->renderer = $renderer;
        $this->stageModel = $stageModel;
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
            $params['cohortId'] = $request->getQueryParams()['cohortId'];
            $params['data']['lastStage'] = $this->stageModel->getHighestOrderNo();

            if (isset($params['cohortId']) && $params['cohortId'] != 'all') {
                $params['data']['applicants'] =
                    $this->applicantModel->getAllApplicantsByCohort($params['cohortId'], $params['sort']);
            } else {
                $params['data']['applicants'] = $this->applicantModel->getAllApplicants($params['sort']);
            }

            return $this->renderer->render($response, 'applicants.phtml', $params);
        }
        return $response->withHeader('Location', '/');
    }
}
