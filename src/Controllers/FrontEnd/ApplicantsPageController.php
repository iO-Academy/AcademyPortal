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
    private $numberOfApplicantsPerPage = 20;

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
            if (isset($_SESSION['page']) && ($_SESSION['page'] > $params['count'] || $_SESSION['page'] < 1)) {
                $_SESSION['page'] = 1;
            }
            $params['data']['applicants'] =
                array_slice(
                    $allApplicants,
                    ($params['page'] - 1) * $this->numberOfApplicantsPerPage,
                    $this->numberOfApplicantsPerPage
                );

            return $this->renderer->render($response, 'applicants.phtml', $params);
        }
        return $response->withHeader('Location', '/');
    }
}
