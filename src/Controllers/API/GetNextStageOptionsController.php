<?php

namespace Portal\Controllers\API;

use Portal\Abstracts\Controller;
use Portal\Models\ApplicantModel;
use Portal\Models\RandomPasswordModel;
use Portal\Models\StageModel;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class GetNextStageOptionsController extends Controller
{
    private StageModel $stageModel;
    private RandomPasswordModel $password;
    private ApplicantModel $applicantModel;

    public function __construct(StageModel $stageModel, RandomPasswordModel $password, ApplicantModel $applicantModel)
    {
        $this->stageModel = $stageModel;
        $this->password = $password;
        $this->applicantModel = $applicantModel;
    }

    /**
     * Calls a method to get all the events and send JSON back with the info
     */

    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $data = [
            'success' => false,
            'message' => 'Something went wrong',
            'data' => []
        ];
        $statusCode = 200;
        $stageId = intval($args['stageid']);
        try {
            $nextId = intval($this->stageModel->getNextStageId($stageId)['id']);
            $firstStudentStageId = $this->stageModel->getFirstStudentStage();
            if ($nextId === $firstStudentStageId && !empty($request->getQueryParams()['applicantId'])) {
                $data['data']['password'] = $this->password;
                $encryptedPassword = password_hash($data['data']['password'], PASSWORD_DEFAULT);
                $this->applicantModel->addApplicantPassword(
                    $encryptedPassword,
                    $request->getQueryParams()['applicantId']
                );
            }
            $data['data']['nextStageOptions'] = $this->stageModel->getOptionsByStageID($nextId);
            $data['data']['nextStageId'] = $nextId;
            $data['data']['nextStageTitle'] = $this->stageModel->getStageTitleById($nextId);
            $data['data']['currentStage'] = $this->stageModel->getStageById($stageId);
            $data['success'] = true;
            $data['message'] = 'Found data in GetNextStageOptionsController';
        } catch (\Exception $e) {
            $statusCode = 400;
            $data['success'] = false;
            $data['message'] = $e->getMessage();
        }
        return $this->respondWithJson($response, $data, $statusCode);
    }
}
