<?php

namespace Portal\ViewHelpers;

use Portal\Entities\StageEntity;

class StagesPageViewHelper
{

    /**
     * Concatenates new stages table ready to be output.
     * Runs an if statement to check whether or not there are options in a stage.
     * If there are options, the delete button is disabled.
     *
     * @param $stages
     *
     * @return string $result, returns table of stages
     */
    public static function displayStages($stages)
    {
        $result = '';
        $counter = 1;
        foreach ($stages as $stage) {
            if ($stage instanceof StageEntity) {
                $isStudent = $stage->getStudent() ? ' checked' : '';

                $result .= '<tr class="" data-id="' . $stage->getStageId() . '">';
                $result .= '<td class="order">';
                $result .= $counter++;
                $result .= '</td>';
                $result .= '<td>';
                $result .= '<p class="stageTitle">' . $stage->getStageTitle();
                if ($stage->getStudent()) {
                    $result .= '<i class="glyphicon glyphicon-education text-success"></i>';
                }
                $result .= '</p>';
                $result .= '<form data-id="' . $stage->getStageId() . '" class="stagesTableForm form-inline">';
                $result .= '<div>';
                $result .= '<label>Student stage:';
                $result .= ' <input type="checkbox" name="student"' . $isStudent . '> ';
                $result .= '<i class="glyphicon glyphicon-education text-success"></i>';
                $result .= '</label>';
                $result .= '</div>';
                $result .= '<input type="text" class="form-control stageEditTitle"';
                $result .= 'value="' . $stage->getStageTitle() . '"/>';
                $result .= '<input type="submit" class="stageEditSubmit btn btn-success" value="Edit">';
                $result .= '</form>';
                $result .= '<div class="optionsContainer hidden" data-stageId="' . $stage->getStageId() . '">';
                if (empty($stage->getOptions())) {
                    $result .= '<div class="optionContainer multiOptionsContainer">';
                    $result .= '<form data-id="" class="optionAddForm form-inline">';
                    $result .= '<input type="text" class="optionAddTitle form-control ';
                    $result .= 'firstOption" placeholder="Type the name of your new option"/>';
                } else {
                    foreach ($stage->getOptions() as $option) {
                        $result .= '<div class="optionContainer">';
                        $result .= '<p class="optionTitle" data-optionId="';
                        $result .= $option->getOptionId() . '">' . $option->getOptionTitle();
                        $result .= '<a class="text-danger optionDelete" data-optionId="';
                        $result .= $option->getOptionId() . '" ';
                        $result .= 'data-stageid="' . $stage->getStageId() . '">Delete</a>';
                        $result .= '<a class="optionEdit" data-optionId="' . $option->getOptionId() . '">Edit</a>';
                        $result .= '</p>';
                        $result .= '<form class="optionTableForm hidden form-inline"';
                        $result .= ' data-optionId="' . $option->getOptionId() . '">';
                        $result .= '<input type="text" class="optionEditTitle form-control" value="';
                        $result .= $option->getOptionTitle() . '"/>';
                        $result .= '<input type="submit" class="optionEditSubmit btn btn-success" ';
                        $result .= 'value="Submit" data-optionid="' . $option->getOptionId() . '">';
                        $result .= '</form>';
                        $result .= '</div>';
                    }
                    $result .= '<div class="optionContainer">';
                    $result .= '<form data-id="" class="optionAddForm form-inline">';
                }
                $result .= '<input type="text" class="optionAddTitle form-control" ';
                $result .= 'placeholder="Type the name of your new option"/>';
                $result .= '<input type="submit" class="optionAddSubmit btn btn-success" data-stageid="';
                $result .= $stage->getStageId() . '" value="Submit">';
                $result .= '</form>';
                $result .= '</div>';
                $result .= '</div>';
                $result .= '</td>';
                $result .= '<td class="col-xs-2 text-center"><a class="toggleEditForm">Edit</a></td>';
                if (empty($stage->getOptions())) {
                    $result .= '<td class="col-xs-2 text-center"><a data-id="' . $stage->getStageId()
                    . '" class="text-danger delete">Delete</a></td>';
                } else {
                    $result .= '<td class="col-xs-2 text-center disabled"><a data-id="' . $stage->getStageId()
                    . '" class="text-danger delete disabled">Delete</a></td>';
                }
                $result .= '<td class="col-xs-2 text-center"><a class="toggleEditOptions" data-stageId="';
                $result .= $stage->getStageId() . '">Options</a></td>';
                $result .= '</tr>';
            }
        }
        return ($result);
    }
}
