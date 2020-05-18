<?php

namespace Portal\Controllers;

use Portal\Abstracts\Controller;
use Portal\Models\StageModel;

class DeleteStageOptionController extends Controller 
{
    private $stageModel;

    public function __construct(StageModel $stageModel)
    {
        $this->stageModel = $stageModel;        
    }

    public function __invoke()
    {

    }
}