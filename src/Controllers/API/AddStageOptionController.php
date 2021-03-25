<?php

namespace Portal\Controllers\API;

use Portal\Abstracts\Controller;
use Portal\Models\StageModel;
use Portal\Sanitisers\OptionsSanitiser;
use Portal\Validators\OptionsValidator;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class AddStageOptionController extends Controller
{
    private $stageModel;

    /** Constructor assigns StageModel to this object
     *
     * AddStageOptionController constructor.
     * @param StageModel $stageModel
     */
    public function __construct(StageModel $stageModel)
    {
        $this->stageModel = $stageModel;
    }

    /** On invoke, check request input has data, then validate the data,
     * then create new OptionsEntity to send to DB via StageModel
     *
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response - with json and status 200/400/500 for success/client error/server error
     */
    public function __invoke(Request $request, Response $response, array $args)
    {
        $formOptions = $request->getParsedBody();

        $data = [
            'success' => false,
            'message' => 'Unexpected Error.',
            'data' => []
        ];
        $statusCode = 500;

        if ($_SESSION['loggedIn'] === true) {
            if (!empty($formOptions['data'])) {
                foreach ($formOptions['data'] as $option) {
                    if (!OptionsValidator::validateOption($option)) {
                        $statusCode = 400;
                        $data['message'] = 'You have not entered valid option/options';
                        return $this->respondWithJson($response, $data, $statusCode);
                    }
                }
                foreach ($formOptions['data'] as $option) {
                    $option = OptionsSanitiser::sanitise($option);
                    if ($this->stageModel->createOption($option['option'], (int) $option['stageId'])) {
                        $data = [
                            'success' => true,
                            'message' => 'Option added successfully',
                            'data' => []
                        ];
                        $statusCode = 200;
                    } else {
                        $data['message'] = 'Error adding to database';
                    }
                }
            } else {
                $statusCode = 400;
                $data['message'] = 'You must type an option';
            }
            return $this->respondWithJson($response, $data, $statusCode);
        }
    }
}
