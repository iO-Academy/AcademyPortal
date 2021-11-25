<?php

namespace Tests\ViewHelpers;

use Tests\TestCase;
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
        $expected = '<trclass=""data-id="1"><tdclass="col-xs-1order">1</td><tdclass="col-xs-2"><pclass="stageTitle">
            Stage1test</p><formdata-id="1"class="stagesTableFormform-inline"><div><label>Studentstage:
            <inputtype="checkbox"name="student"><iclass="glyphiconglyphicon-educationtext-success"></i>
            </label></div><inputtype="text"class="form-controlstageEditTitle"value="Stage1test"/>
            <inputtype="submit"class="stageEditSubmitbtnbtn-success"value="Edit"></form><div
            class="optionsContainerhidden"data-stageId="1"><divclass="optionContainermultiOptionsContainer">
            <formdata-id=""class="optionAddFormform-inline"><inputtype="text"class="optionAddTitle
            form-controlfirstOption"placeholder="Typethenameofyournewoption"/><inputtype="text"
            class="optionAddTitleform-control"placeholder="Typethenameofyournewoption"/>
            <inputtype="submit"class="optionAddSubmitbtnbtn-success"data-stageid="1"value="Submit"></form>
            </div></div></td><tdclass="col-xs-2text-center"><aclass="toggleEditForm">Edit</a></td>
            <tdclass="col-xs-2text-center"><adata-hasOptions="0"data-id="1"class="text-dangerdeletedisabled">
            Delete</a></td><tdclass="col-xs-2text-center"><aclass="toggleEditOptions"data-stageId="1">
            Options</a></td><tdclass="col-xs-2text-centerstageLock"data-stageId="1"data-locked="1">
            <iclass="fasfa-lock"></i></td></tr>';

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
        $expected = '<trclass=""data-id="1"><tdclass="col-xs-1order">1</td><tdclass="col-xs-2">
                    <pclass="stageTitle">Stage1test</p><formdata-id="1"class="stagesTableFormform-inline">
                    <div><label>Studentstage:<inputtype="checkbox"name="student">
                    <iclass="glyphiconglyphicon-educationtext-success">
                    </i></label></div><inputtype="text"class="form-controlstageEditTitle"value="Stage1test"/>
                    <inputtype="submit"class="stageEditSubmitbtnbtn-success"value="Edit"></form>
                    <divclass="optionsContainerhidden"data-stageId="1">
                    <divclass="optionContainer">
                    <pclass="optionTitle"data-optionId="1">aTitle
                    <aclass="text-dangeroptionDelete"data-optionId="1"data-stageid="1">Delete</a>
                    <aclass="optionEdit"data-optionId="1">Edit</a></p>
                    <formclass="optionTableFormhiddenform-inline"data-optionId="1">
                    <inputtype="text"class="optionEditTitleform-control"value="aTitle"/>
                    <inputtype="submit"class="optionEditSubmitbtnbtn-success"value="Submit"data-optionid="1">
                    </form></div><divclass="optionContainer">
                    <formdata-id=""class="optionAddFormform-inline">
                    <inputtype="text"class="optionAddTitleform-control"placeholder="Typethenameofyournewoption"/>
                    <inputtype="submit"class="optionAddSubmitbtnbtn-success"data-stageid="1"value="Submit">
                    </form></div></div></td>
                    <tdclass="col-xs-2text-center"><aclass="toggleEditForm">Edit</a></td>
                    <tdclass="col-xs-2text-centerdisabled">
                    <adata-hasOptions="1"data-id="1"class="text-dangerdeletedisabled">Delete
                    </a></td><tdclass="col-xs-2text-center">
                    <aclass="toggleEditOptions"data-stageId="1">Options</a></td>
                    <tdclass="col-xs-2text-centerstageLock"data-stageId="1"data-locked="1">
                    <iclass="fasfa-lock"></i></td></tr>';

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
