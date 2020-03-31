<?php

namespace Portal\Controllers;

use \Slim\Http\Request as Request;
use \Slim\Http\Response as Response;
use Portal\Models\StageModel;

class DeleteStageController
{
    private $stageModel;

    public function __construct(StageModel $stageModel)
    {
        $this->stageModel = $stageModel;
    }


}