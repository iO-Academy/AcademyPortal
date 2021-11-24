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
    private $stageModel;
    private $password;
    private $applicantModel;

    /**
     * GetEventsController constructor.
     *
     * @param StageModel $stageModel
     */

    public function __construct(StageModel $stageModel, string $password, ApplicantModel $applicantModel)
    {
        $this->stageModel = $stageModel;
        $this->password = $password;
        $this->applicantModel = $applicantModel;
    }

    /**
     * Calls a method to get all the events and send JSON back with the info
     *
     * @param Request $request HTTP request
     * @param Response $response HTTP response
     * @param array $args
     * @return Response returns JSON with hiring partner data
     */
    public function __invoke(Request $request, Response $response, array $args)
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
            $data['data']['currentStageTitle'] = $this->stageModel->getStageTitleById($stageId);
            $data['data']['nextStageTitle'] = $this->stageModel->getStageTitleById($nextId);
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
