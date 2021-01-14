<?php

namespace Portal\Controllers\FrontEnd;

use Portal\Abstracts\Controller;
use Portal\Interfaces\ApplicantModelInterface;
use Portal\Models\ApplicantModel;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\PhpRenderer;
use Portal\Models\StageModel;

class EditApplicantPageController extends Controller
{
    private $applicantModel;
    private $renderer;
    private $stageModel;

    /**
     * EditApplicantPageController constructor.
     * @param ApplicantModelInterface $applicantModel
     * @param StageModel $stageModel
     * @param PhpRenderer $renderer
     */
    public function __construct(ApplicantModelInterface $applicantModel, StageModel $stageModel, PhpRenderer $renderer)
    {
        $this->applicantModel = $applicantModel;
        $this->renderer = $renderer;
        $this->stageModel = $stageModel;
    }

    public function __invoke(Request $request, Response $response, array $args)
    {
        if ($_SESSION['loggedIn'] === true) {
            $id = $request->getQueryParams()['id'];
            if ($id > 0) {
                $data['applicant'] = $this->applicantModel->getApplicantById($id);
                $data['stages'] = $this->stageModel->getStageTitles();
                $data['stageOptions'] = $this->stageModel->getStageOptions();
                $applicantStageId = $data['applicant']->getStageID();
                $applicantOptionName = $data['applicant']->getStageOptionName();
                $stageIdEntity = $this->stageModel->getStageById($applicantStageId);
                if ($applicantOptionName != null) {
                    $data['currentOption'] = $applicantOptionName;
                }
                $data['currentStage'] = $stageIdEntity->getStageTitle();
                return $this->renderer->render($response, 'applicantForm.phtml', $data);
            }
            return $response->withHeader('Location', './applicants')->withStatus(400);
        }
        return $response->withStatus(401);
    }
}
