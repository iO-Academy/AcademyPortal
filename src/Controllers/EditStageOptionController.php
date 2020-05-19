<?php

namespace Portal\Controllers;

use Portal\Abstracts\Controller;
use Portal\Models\StageModel;

class EditStageOptionController
{
    private $stageModel;
    private $optionId;
    private $option;

    public function __construct(StageModel $stageModel)
    {
        $this->stageModel = $stageModel;
    }

    public function __invoke(Request $request, Response $response, array $args)
    {
        $formOption = $request->getParsedBody();

        $this->optionId = $formOption[optionId];
        $this->option = $formOption[option];

        $this->stageModel->editOption($this->optionId, $this->option);
        
        return $response->withHeader('location', '/displayStages');
    }
}
