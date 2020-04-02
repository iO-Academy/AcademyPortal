<?php

namespace Portal\ViewHelpers;

use \Portal\Entities\StageEntity;

class StagesPageViewHelper
{
    /**
     *  Concatenates new stages table ready to be output.
     *
     * @param $stages
     *
     * @return string $result, returns table of stages
     */
    public static function displayStages($stages)
    {
        $result = '';
        foreach ($stages as $stage) {
            if ($stage instanceof StageEntity) {
                $result .= '<tr class="list-group-item" data-id="'. $stage->getStageId().'">';
                $result .= '<td>';
                $result .= '<p>'. $stage->getStageTitle().'</p>';
                $result .= '<form data-id="'. $stage->getStageId().'" class="stagesTableForm">';
                $result .= '<input type="text" class="stageEditTitle col-xs-10" value="'
                    . $stage->getStageTitle().'"/>';
                $result .= '<input type="submit" class="stageEditSubmit btn-success" value="Submit">';
                $result .= '</form>';
                $result .= '</td>';
                $result .= '<td class="col-xs-2 text-center"><a class="toggleEditForm">Edit</a></td>';
                $result .= '<td class="col-xs-2 text-center"><a data-id="'. $stage->getStageId()
                    .'" class="text-danger delete">Delete</a></td>';
                $result .= '</tr>';
            }
        }
        return ($result);
    }
}
