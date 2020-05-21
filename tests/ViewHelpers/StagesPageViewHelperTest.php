<?php

namespace Tests\ViewHelpers;

use PHPUnit\Framework\TestCase;
use Portal\ViewHelpers\StagesPageViewHelper;
use Portal\Entities\StageEntity;
use Portal\Entities\OptionsEntity;

class StagesPageViewHelperTest extends TestCase
{
    /**
     *  Makes sure view helper method successfully handles obj and creates a string with the correct
     *  title and id. This is for when a stage has no options.
     */
    public function testSuccessNoOptionsDisplayStages()
    {
        $expected = '';
        $expected .= '<tr class="" data-id="1">';
        $expected .= '<td>';
        $expected .= '<p>Stage 1 test</p>';
        $expected .= '<form data-id="1" class="stagesTableForm">';
        $expected .= '<input type="text" class="stageEditTitle col-xs-10" value="Stage 1 test"/>';
        $expected .= '<input type="submit" class="stageEditSubmit btn-success" value="Submit">';
        $expected .= '</form>';
        $expected .= '<div class="optionsContainer hide" data-stageId="1">';
        $expected .= '<div class="optionContainer multiOptionsContainer">';
        $expected .= '<form data-id="" class="optionAddForm">';
        $expected .= '<input type="text" class="optionAddTitle ';
        $expected .= 'firstOption col-xs-10" placeholder="Type the name of your new option"/>';
        $expected .= '<input type="text" class="optionAddTitle col-xs-10" ';
        $expected .= 'placeholder="Type the name of your new option"/>';
        $expected .= '<input type="submit" class="optionAddSubmit btn-success" data-stageid="';
        $expected .= '1" value="Submit">';
        $expected .= '</form>';
        $expected .= '</div>';
        $expected .= '</div>';
        $expected .= '</td>';
        $expected .= '<td class="col-xs-2 text-center"><a class="toggleEditForm">Edit</a></td>';
        $expected .= '<td class="col-xs-2 text-center"><a data-id="1" class="text-danger delete">Delete</a></td>';
        $expected .= '<td class="col-xs-2 text-center">';
        $expected .= '<a class="toggleEditOptions" data-stageId="1">Options</a></td>';
        $expected .= '</tr>';
        $stageEntityMock = $this->createMock(StageEntity::class);
        $stageEntityMock->method('getStageId')->willReturn('1');
        $stageEntityMock->method('getStageTitle')->willReturn('Stage 1 test');
        $stageEntityMock->method('getOptions')->willReturn([]);

        $input =  [$stageEntityMock];
        $case = StagesPageViewHelper::displayStages($input);

        $this->assertEquals($expected, $case);
    }

    /**
     *  Makes sure view helper method successfully handles obj and creates a string with the correct
     *  title and id. This is for when a stage has options.
     */
    public function testSuccessOptionsDisplayStages()
    {
        $expected = '';
        $expected .= '<tr class="" data-id="1">';
        $expected .= '<td>';
        $expected .= '<p>Stage 1 test</p>';
        $expected .= '<form data-id="1" class="stagesTableForm">';
        $expected .= '<input type="text" class="stageEditTitle col-xs-10" value="Stage 1 test"/>';
        $expected .= '<input type="submit" class="stageEditSubmit btn-success" value="Submit">';
        $expected .= '</form>';
        $expected .= '<div class="optionsContainer hide" data-stageId="1">';
        $expected .= '<div class="optionContainer">';
        $expected .= '<p class="optionTitle" data-optionId="';
        $expected .= '1">aTitle';
        $expected .= '<a class="text-danger optionDelete" data-optionId="';
        $expected .= '1" data-stageid="1">Delete</a>';
        $expected .= '<a class="optionEdit" data-optionId="1">Edit</a>';
        $expected .= '</p>';
        $expected .= '<form class="optionTableForm hide" data-optionId="1">';
        $expected .= '<input type="text" class="optionEditTitle col-xs-10" value="';
        $expected .= 'aTitle"/>';
        $expected .= '<input type="submit" class="optionEditSubmit btn-success" ';
        $expected .= 'value="Submit" data-optionid="1">';
        $expected .= '</form>';
        $expected .= '</div>';
        $expected .= '<div class="optionContainer">';
        $expected .= '<form data-id="" class="optionAddForm ">';
        $expected .= '<input type="text" class="optionAddTitle col-xs-10" ';
        $expected .= 'placeholder="Type the name of your new option"/>';
        $expected .= '<input type="submit" class="optionAddSubmit btn-success" data-stageid="1';
        $expected .= '" value="Submit">';
        $expected .= '</form>';
        $expected .= '</div>';
        $expected .= '</div>';
        $expected .= '</td>';
        $expected .= '<td class="col-xs-2 text-center">';
        $expected .= '<a class="toggleEditForm">Edit</a></td>';
        $expected .= '<td class="col-xs-2 text-center disabled">';
        $expected .= '<a data-id="1" class="text-danger delete disabled">Delete</a></td>';
        $expected .= '<td class="col-xs-2 text-center">';
        $expected .= '<a class="toggleEditOptions" data-stageId="1">Options</a></td>';
        $expected .= '</tr>';

        $optionEntityMock = $this->createMock(OptionsEntity::class);
        $optionEntityMock->method('getOptionId')->willReturn('1');
        $optionEntityMock->method('getOptionTitle')->willReturn('aTitle');

        $stageEntityMock = $this->createMock(StageEntity::class);
        $stageEntityMock->method('getStageId')->willReturn('1');
        $stageEntityMock->method('getStageTitle')->willReturn('Stage 1 test');
        $stageEntityMock->method('getOptions')->willReturn([$optionEntityMock]);

        $input =  [$stageEntityMock];
        $case = StagesPageViewHelper::displayStages($input);

        $this->assertEquals($expected, $case);
    }
}
