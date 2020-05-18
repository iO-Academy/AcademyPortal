<?php

namespace Portal\Controllers;

use Portal\Abstracts\Controller;
use Portal\Models\StageModel;

class AddOptionController extends Controller 
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