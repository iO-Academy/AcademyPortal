<?php

namespace Portal\ViewHelpers;

use \Portal\Entities\StageEntity; /** dependent on stages entity being created */

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
        foreach($stages as $stage) {
            if ($stage instanceof StageEntity) {
                $result .= '<tr>';
                $result .=      '<td>';
                $result .=          '<p>'. $stage->getTitle().'</p>';
                $result .=          '<form data-id="'. $stage->getId().'" class="stagesTableForm">';
                $result .=              '<input type="text" class="stageEditTitle col-xs-10" placeholder="'. $stage->getTitle().'"/>';
                $result .=              '<input type="submit" class="stageEditSubmit btn-success" value="Submit">';
                $result .=          '</form>';
                $result .=      '</td>';
                $result .=      '<td class="col-xs-2 text-center"><a class="toggleEditForm">Edit</a></td>';
                $result .=      '<td class="col-xs-2 text-center"><a data-id="'. $stage->getId().'" class="text-danger">Delete</a></td>';
                $result .= '</tr>';
            }
        }
        return ($result);
    }
}
