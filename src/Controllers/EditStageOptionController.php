<?php

namespace Portal\Controllers;

use Portal\Abstracts\Controller;
use Portal\Models\StageModel;
use Portal\Validators\OptionValidator;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class EditStageOptionController extends Controller
{
    private $stageModel;
<<<<<<< HEAD
=======
    private $optionId;
    private $optionTitle;
>>>>>>> 6d335a875064fbdf3c15ea6efaa001e335c325b6

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
     * the editOption method on stageModel
     *
     * @param Request $request
     * @param Response $response
     * @param array $args
     *
     * @return Response - Returns status 200/500 with message in Json
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
                $option = OptionsValidator::validateOptionUpdate($formOption['data']);
            
                if ($option === true) {

                    $this->stageModel->updateOption($formOption['data']);
                    $data = [
                        'success' => true,
                        'msg' => 'Option update successful.',
                        'data' => ''
                    ];

                    $statusCode = 200;

                } else {
                    $data = [
                        'success' => false,
                        'msg' => 'Option update unsuccessful.',
                        'data' => ''
                    ];

                    $statusCode = 400;
                }

                if ($this->stageModel->updateOption($this->optionTitle, $this->optionId)) {
                    $data = [
                        'success' => true,
                        'msg' => 'Option edit successful.',
                        'data' => ''
                    ];
                    $statusCode = 200;
                }
                return $this->respondWithJson($response, $data, $statusCode);
            } catch (\Exception $e) {
                $data['msg'] = $e->getMessage();
                return $this->respondWithJson($response, $data, $statusCode);
            }
        }
        return $this->respondWithJson($response, ['success' => false, 'msg'=> 'Unauthorized'], 401);
    }
}
