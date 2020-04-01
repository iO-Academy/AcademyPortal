<?php

namespace Tests\ViewHelpers;

use PHPUnit\Framework\TestCase;
use Portal\ViewHelpers\StagesPageViewHelper;
use Portal\Entities\StageEntity;

class StagesPageViewHelperTest extends TestCase
{
    public function testSuccessDisplayStages()
    {
        $expected = '';
        $expected .= '<tr>';
        $expected .=      '<td>';
        $expected .=          '<p>Stage 1 test</p>';
        $expected .=          '<form data-id="1" class="stagesTableForm">';
        $expected .=              '<input type="text" class="stageEditTitle col-xs-10" placeholder="Stage 1 test"/>';
        $expected .=              '<input type="submit" class="stageEditSubmit btn-success" value="Submit">';
        $expected .=          '</form>';
        $expected .=      '</td>';
        $expected .=      '<td class="col-xs-2 text-center"><a class="toggleEditForm">Edit</a></td>';
        $expected .=      '<td class="col-xs-2 text-center"><a data-id="1" class="text-danger">Delete</a></td>';
        $expected .= '</tr>';
        $entityMock = $this->createMock(StageEntity::class);
        $entityMock->method('getId')->willReturn('1');
        $entityMock->method('getTitle')->willReturn('Stage 1 test');

        $input =  [$entityMock];
        $case = StagesPageViewHelper::displayStages($input);

        $this->assertEquals($expected, $case);

    }
}