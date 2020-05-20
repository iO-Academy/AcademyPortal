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
                $result .= '<tr class="" data-id="'. $stage->getStageId().'">';
                $result .= '<td>';
                $result .= '<p>'. $stage->getStageTitle().'</p>';
                $result .= '<form data-id="'. $stage->getStageId().'" class="stagesTableForm">';
                $result .= '<input type="text" class="stageEditTitle col-xs-10" value="'
                    . $stage->getStageTitle().'"/>';
                $result .= '<input type="submit" class="stageEditSubmit btn-success" value="Submit">';
                $result .= '</form>';
                $result .= '<div class="optionsContainer hide" data-stageId="'. $stage->getStageId().'">';
                if(empty($stage->getOptions())){
                    $result .= '<form data-id="" class="optionAddForm">';
                    $result .= '<input type="text" class="optionAddTitle col-xs-10" placeholder="Type the name of your new option"/>';
                } else {
                    foreach($stage->getOptions() as $option){
                        $result .= '<div class="optionContainer">';
                        $result .= '<p class="optionTitle" data-optionId="'.$option->getOptionId().'">'. $option->getOptionTitle();
                        $result .= '<a class="text-danger optionDelete" data-optionId="'.$option->getOptionId().'">Delete</a>';
                        $result .= '<a class="optionEdit" data-optionId="'.$option->getOptionId().'">Edit</a>';
                        $result .= '</p>';
                        $result .= '<form class="optionTableForm hide" data-optionId="'.$option->getOptionId().'">';
                        $result .= '<input type="text" class="optionEditTitle col-xs-10" value="'. $option->getOptionTitle().'"/>';
                        $result .= '<input type="submit" class="optionEditSubmit btn-success" value="Submit">';
                        $result .= '</form>';
                        $result .= '</div>';
                    }
                    $result .= '<form data-id="" class="optionAddForm ">';
                }
                $result .= '<input type="text" class="optionAddTitle col-xs-10" placeholder="Type the name of your new option"/>';
                $result .= '<input type="submit" class="optionAddSubmit btn-success" value="Submit">';
                $result .= '</form>';
                $result .= '</div>';
                $result .= '</td>';
                $result .= '<td class="col-xs-2 text-center"><a class="toggleEditForm">Edit</a></td>';
                $result .= '<td class="col-xs-2 text-center"><a data-id="'. $stage->getStageId()
                    .'" class="text-danger delete">Delete</a></td>';
                $result .= '<td class="col-xs-2 text-center"><a class="toggleEditOptions" data-stageId="'.$stage->getStageId().'">Options</a></td>';
                $result .= '</tr>';
            }
        }
        return ($result);
    }
}
