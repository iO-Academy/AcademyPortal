<?php

namespace Tests\ViewHelpers;

use Portal\Entities\TrainerEntity;
use Portal\ViewHelpers\TrainerCheckboxViewHelper;
use Tests\TestCase;
use TypeError;

class TrainerCheckboxViewHelperTest extends TestCase
{
    public function testSuccessDisplayTrainerCheckbox()
    {
        $input = $this->createMock(TrainerEntity::class);
        $input->method('getId')->willReturn('1');
        $input->method('getName')->willReturn('Charlie');
        $exp = '<input type="checkbox" data-id="1" name="trainer-checkbox"';
        $exp .= '><label class="trainerCheckboxLabel" for="">Charlie</label>';
        $actual = TrainerCheckboxViewHelper::displayTrainerCheckbox([$input]);
        $this->assertEquals($exp, $actual);
    }

    public function testFailureDisplayTrainerCheckbox()
    {
        $input = [[1, 2]];
        $expected = '';
        $actual = TrainerCheckboxViewHelper::displayTrainerCheckbox($input);
        $this->assertEquals($expected, $actual);
    }

    public function testMalformedDisplayTrainerCheckbox()
    {
        $input = 'hello';
        $this->expectException(TypeError::class);
        $case = TrainerCheckboxViewHelper::displayTrainerCheckbox($input);
    }
}
