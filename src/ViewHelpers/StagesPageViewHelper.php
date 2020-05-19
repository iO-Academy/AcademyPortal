<?php

namespace Portal\ViewHelpers;

use \Portal\Entities\StageEntity;

class StagesPageViewHelper
{

    private static $hasOptions = true;
    private static $options = ['option A', 'option B', 'option C'];

    public function getHasOptions(){
        return self::$hasOptions;
    }

    public function getOptions(){
        return self::$options;
    }


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
                if(self::$hasOptions === false){
                    $result .= '<form data-id="" class="optionAddForm">';
                    $result .= '<input type="text" class="optionAddTitle col-xs-12" placeholder="Type the name of your new option"/>';
                } else {
                    foreach(self::$options as $option){
                        $result .= '<p class="optionP">'. $option;
                        $result .= '<a class="text-danger optionDeleteSubmit">Delete</a>';
                        $result .= '<a class="optionEditSubmit">Edit</a>';
                        $result .= '</p>';
                        $result .= '<form data-id="'. $option.'" class="optionTableForm">';
                        $result .= '<input type="text" class="optionEditTitle col-xs-12" value="'. $option.'"/>';
                        $result .= '<input type="submit" class="optionEditSubmit" value="Submit">';
                        $result .= '</form>';
                    }
                    $result .= '<form data-id="" class="optionAddForm">';
                }
                $result .= '<input type="text" class="optionAddTitle col-xs-12" placeholder="Type the name of your new option"/>';
                $result .= '<input type="submit" class="optionAddSubmit btn-success" value="Submit">';
                $result .= '</form>';

                $result .= '</td>';
                $result .= '<td class="col-xs-2 text-center"><a class="toggleEditForm">Edit</a></td>';
                $result .= '<td class="col-xs-2 text-center"><a data-id="'. $stage->getStageId()
                    .'" class="text-danger delete">Delete</a></td>';
                $result .= '<td class="col-xs-2 text-center"<a class="toggleEditOptions">Options</a></td>';
                $result .= '</tr>';
            }
        }
        return ($result);
    }
}
