<?php

namespace Portal\Controllers\FrontEnd;

use Portal\Abstracts\Controller;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Views\PhpRenderer;
use Portal\Models\ApplicantModel;
use Portal\Models\StageModel;

class ApplicantsPageController extends Controller
{
    private $renderer;
    private $applicantModel;
    private $stageModel;

    /**
     * ApplicantsPageController constructor.
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
            $_SESSION['sort'] = $request->getQueryParams()['sort'] ?? $_SESSION['sort'] ?? '';
            $_SESSION['cohortId'] = $request->getQueryParams()['cohortId'] ?? $_SESSION['cohortId'] ?? '%';
            $_SESSION['stageId'] = $request->getQueryParams()['stageId'] ?? $_SESSION['stageId'] ?? '%';
            $_SESSION['page'] = $request->getQueryParams()['page'] ?? $_SESSION['page'] ?? '1';
            $params['sort'] = $_SESSION['sort'];
            $params['cohortId'] = $_SESSION['cohortId'];
            $params['stageId'] = $_SESSION['stageId'];
            $params['data']['lastStage'] = $this->stageModel->getHighestOrderNo();

            if (isset($params['cohortId']) && $params['cohortId'] == 'all') {
                $params['cohortId'] = '%';
            }
            if (isset($params['stageId']) && $params['stageId'] == 'all') {
                $params['stageId'] = '%';
            }

            $params['count'] = $this->applicantModel->countPaginationPages($params['stageId'], $params['cohortId']);

            if (isset($_SESSION['page']) && $_SESSION['page'] > $params['count']) {
                $_SESSION['page'] = 1;
            }
            $params['page'] = $_SESSION['page'];

            $params['data']['applicants'] = $this->applicantModel
                ->getApplicants($params['stageId'], $params['cohortId'], $params['sort'], $params['page']);
            return $this->renderer->render($response, 'applicants.phtml', $params);
        }
        return $response->withHeader('Location', '/');
    }
}
