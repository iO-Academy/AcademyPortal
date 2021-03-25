<?php

namespace Portal\Controllers\API;

use Portal\Abstracts\Controller;
use Portal\Models\StageModel;
use Portal\Sanitisers\OptionsSanitiser;
use Portal\Validators\OptionsValidator;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class EditStageOptionController extends Controller
{
    private $stageModel;

    /** Constructor assigns StageModel to this object
     *
     * EditStageOptionController constructor.
     * @param StageModel $stageModel
     */
    public function __construct(StageModel $stageModel)
    {
        $this->stageModel = $stageModel;
    }

    /**
     * Checks if user is logged in, validates the http request data and calls
     * the updateOption method on stageModel
     *
     * @param Request $request
     * @param Response $response
     * @param array $args
     *
     * @return Response - Returns status 200/400/500 with message in Json
     */
    public function __invoke(Request $request, Response $response, array $args)
    {
        if ($_SESSION['loggedIn'] === true) {
            $data = [
                'success' => false,
                'msg' => 'Option not found.',
                'data' => []
            ];
            $statusCode = 500;
            try {
                $formOption = $request->getParsedBody();

                if (OptionsValidator::validateOption($formOption)) {
                    $formOption = OptionsSanitiser::sanitise($formOption);
                    $this->stageModel->updateOption($formOption);
                    $data = [
                        'success' => true,
                        'msg' => 'Option update successful.',
                        'data' => ''
                    ];
                    $statusCode = 200;
                } else {
                    $data = [
                        'success' => false,
                        'msg' => 'Option data invalid.',
                        'data' => ''
                    ];
                    $statusCode = 400;
                }

                return $this->respondWithJson($response, $data, $statusCode);
            } catch (\Exception $e) {
                $data['msg'] = $e->getMessage();
                return $this->respondWithJson($response, $data, $statusCode);
            }
        }
        return $this->respondWithJson($response, ['success' => false, 'msg' => 'Unauthorized'], 401);
    }
}
