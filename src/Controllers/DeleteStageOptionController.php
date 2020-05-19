<?php

namespace Portal\Controllers;

use Portal\Abstracts\Controller;
use Portal\Models\StageModel;

class DeleteStageOptionController
{
    private $stageModel;
    private $optionId;

    public function __construct(StageModel $stageModel)
    {
        $this->stageModel = $stageModel;
    }

    public function __invoke(Request $request, Response $response, array $args)
    {
        $formOption = $request->getParsedBody();

        $this->optionId = $formOption[optionId];

        $this->stageModel->deleteOption($this->optionId);
        
        return $response->withHeader('location', '/displayStages');
    }
}
