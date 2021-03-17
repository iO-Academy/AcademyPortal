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
        $expected = '<tr class="" data-id="1"><td class="order">1</td><td><p class="stageTitle">Stage 1 test</p><form 
data-id="1" class="stagesTableForm form-inline"><div><label>Student stage: <input type="checkbox" name="student"> 
<i class="glyphicon glyphicon-education text-success"></i></label></div><input type="text" class="form-control 
stageEditTitle"value="Stage 1 test"/><input type="submit" class="stageEditSubmit btn btn-success" value="Edit">
</form><div class="optionsContainer hidden" data-stageId="1"><div class="optionContainer multiOptionsContainer">
<form data-id="" class="optionAddForm form-inline"><input type="text" class="optionAddTitle form-control firstOption" 
placeholder="Type the name of your new option"/><input type="text" class="optionAddTitle form-control" 
placeholder="Type the name of your new option"/><input type="submit" class="optionAddSubmit btn btn-success" 
data-stageid="1" value="Submit"></form></div></div></td><td class="col-xs-2 text-center">
<a class="toggleEditForm">Edit</a></td><td class="col-xs-2 text-center">
<a data-id="1" class="text-danger delete">Delete</a></td><td class="col-xs-2 text-center">
<a class="toggleEditOptions" data-stageId="1">Options</a></td></tr>';

        $expected = preg_replace('/\s+/', '', $expected); // removes whitespace
        $stageEntityMock = $this->createMock(StageEntity::class);
        $stageEntityMock->method('getStageId')->willReturn('1');
        $stageEntityMock->method('getStageTitle')->willReturn('Stage 1 test');
        $stageEntityMock->method('getOptions')->willReturn([]);

        $input =  [$stageEntityMock];
        $actual = StagesPageViewHelper::displayStages($input);
        $actual = preg_replace('/\s+/', '', $actual); // removes whitespace
        $this->assertEquals($expected, $actual);
    }

    /**
     *  Makes sure view helper method successfully handles obj and creates a string with the correct
     *  title and id. This is for when a stage has options.
     */
    public function testSuccessOptionsDisplayStages()
    {
        $expected = '<tr class="" data-id="1"><td class="order">1</td><td><p class="stageTitle">Stage 1 test</p>
<form data-id="1" class="stagesTableForm form-inline"><div><label>Student stage: <input type="checkbox" name="student"> 
<i class="glyphicon glyphicon-education text-success"></i></label></div>
<input type="text" class="form-control stageEditTitle"value="Stage 1 test"/>
<input type="submit" class="stageEditSubmit btn btn-success" value="Edit"></form>
<div class="optionsContainer hidden" data-stageId="1"><div class="optionContainer">
<p class="optionTitle" data-optionId="1">aTitle
<a class="text-danger optionDelete" data-optionId="1" data-stageid="1">Delete</a>
<a class="optionEdit" data-optionId="1">Edit</a></p>
<form class="optionTableForm hidden form-inline" data-optionId="1">
<input type="text" class="optionEditTitle form-control" value="aTitle"/>
<input type="submit" class="optionEditSubmit btn btn-success" value="Submit" data-optionid="1"></form>
</div><div class="optionContainer"><form data-id="" class="optionAddForm form-inline">
<input type="text" class="optionAddTitle form-control" placeholder="Type the name of your new option"/>
<input type="submit" class="optionAddSubmit btn btn-success" data-stageid="1" value="Submit"></form>
</div></div></td><td class="col-xs-2 text-center"><a class="toggleEditForm">Edit</a></td>
<td class="col-xs-2 text-center disabled"><a data-id="1" class="text-danger delete disabled">Delete</a></td>
<td class="col-xs-2 text-center"><a class="toggleEditOptions" data-stageId="1">Options</a></td></tr>';

        $expected = preg_replace('/\s+/', '', $expected); // removes whitespace
        $optionEntityMock = $this->createMock(OptionsEntity::class);
        $optionEntityMock->method('getOptionId')->willReturn('1');
        $optionEntityMock->method('getOptionTitle')->willReturn('aTitle');

        $stageEntityMock = $this->createMock(StageEntity::class);
        $stageEntityMock->method('getStageId')->willReturn('1');
        $stageEntityMock->method('getStageTitle')->willReturn('Stage 1 test');
        $stageEntityMock->method('getOptions')->willReturn([$optionEntityMock]);

        $input =  [$stageEntityMock];
        $actual = StagesPageViewHelper::displayStages($input);
        $actual = preg_replace('/\s+/', '', $actual); // removes whitespace

        $this->assertEquals($expected, $actual);
    }
}
