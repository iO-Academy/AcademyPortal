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
    private PhpRenderer $renderer;
    private StageModel $stageModel;
    private ApplicantModel $applicantModel;
    private int $numberOfApplicantsPerPage = 20;

    public function __construct(PhpRenderer $renderer, StageModel $stageModel, ApplicantModel $applicantModel)
    {
        $this->renderer = $renderer;
        $this->stageModel = $stageModel;
        $this->applicantModel = $applicantModel;
    }

    /**
     * Renders applicant data on the front end in applicants.phtml.
     */
    public function __invoke(Request $request, Response $response, array $args): Response
    {
        if (!empty($_SESSION['loggedIn']) && $_SESSION['loggedIn']) {
            $_SESSION['name'] = $request->getQueryParams()['name'] ?? $_SESSION['name'] ?? '%';
            $_SESSION['sort'] = $request->getQueryParams()['sort'] ?? $_SESSION['sort'] ?? '';
            $_SESSION['cohortId'] = $request->getQueryParams()['cohortId'] ?? $_SESSION['cohortId'] ?? '%';
            $_SESSION['stageId'] = $request->getQueryParams()['stageId'] ?? $_SESSION['stageId'] ?? '%';
            $_SESSION['page'] = $request->getQueryParams()['page'] ?? '1';
            $params['sort'] = $_SESSION['sort'];
            $params['cohortId'] = $_SESSION['cohortId'];
            $params['stageId'] = $_SESSION['stageId'];
            $params['page'] = $_SESSION['page'];
            $params['data']['lastStage'] = $this->stageModel->getHighestOrderNo();
            $params['data']['stageCount'] = $this->stageModel->stagesCount();
            $params['name'] = $_SESSION['name'];

            if (isset($params['cohortId']) && $params['cohortId'] == 'all') {
                $params['cohortId'] = '%';
            }
            if (isset($params['name']) && $params['name'] == '') {
                $params['name'] = '%';
            }
            if (isset($params['stageId']) && $params['stageId'] == 'all') {
                $params['stageId'] = '%';
            }

            $allApplicants = $this->applicantModel
                ->getApplicants(
                    $params['name'],
                    $params['stageId'],
                    $params['cohortId'],
                    $params['sort']
                );
            // counts number of pages
            $params['count'] = ceil(count($allApplicants) / $this->numberOfApplicantsPerPage);
            if (
                (isset($_SESSION['page']) && ($_SESSION['page'] > $params['count'] || $_SESSION['page'] < 1)) &&
                $_SESSION['page'] !== '1'
            ) {
                return $response->withHeader('Location', '/applicants?page=1')->withStatus(301);
            }
            $params['data']['applicants'] =
                array_slice(
                    $allApplicants,
                    ($params['page'] - 1) * $this->numberOfApplicantsPerPage,
                    $this->numberOfApplicantsPerPage
                );

            return $this->renderer->render($response, 'applicants.phtml', $params);
        }
        return $response->withHeader('Location', '/')->withStatus(301);
    }
}
