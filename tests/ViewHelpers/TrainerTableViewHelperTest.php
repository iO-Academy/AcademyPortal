<?php

namespace Tests\ViewHelpers;

use Portal\Entities\TrainerEntity;
use Portal\ViewHelpers\TrainerTableViewHelper;
use Tests\TestCase;
use TypeError;

class TrainerTableViewHelperTest extends TestCase
{
    public function testSuccessDisplayTrainerTable()
    {
        $input = $this->createMock(TrainerEntity::class);
        $input->method('getId')->willReturn('1');
        $input->method('getName')->willReturn('Charlie');
        $input->method('getEmail')->willReturn('char@lie.com');
        $input->method('getNotes')->willReturn('notes');
        $input->method('getDeleted')->willReturn('0');
        $exp = '<tr><td><a href=\'#\' data-id=\'1\' type=\'button\'';
        $exp .= ' class=\'myBtn\'>Charlie</td><td>char@lie.com<button class="clipboard">';
        $exp .= '<i class="glyphicon glyphicon-copy"></i></button>';
        $exp .= '</td><td><button class=\'btn btn-danger\'>Delete</button></td>';
        $actual = TrainerTableViewHelper::displayTrainerTable([$input]);
        $this->assertEquals($exp, $actual);
    }

    public function testFailureDisplayTrainerTable()
    {
        $input = [[1, 2]];
        $expected = '';
        $actual = TrainerTableViewHelper::displayTrainerTable($input);
        $this->assertEquals($expected, $actual);
    }

    public function testMalformedDisplayTrainerTable()
    {
        $input = 'hello';
        $this->expectException(TypeError::class);
        $case = TrainerTableViewHelper::displayTrainerTable($input);
    }
}
