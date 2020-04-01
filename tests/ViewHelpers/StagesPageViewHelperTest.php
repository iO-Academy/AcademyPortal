<?php

namespace Tests\ViewHelpers;

use PHPUnit\Framework\TestCase;
use Portal\ViewHelpers\StagesPageViewHelper;

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
        $input =  ["id" => "1", "title" => "Stage 1 test"];
        //Create mock for stages entity
        //make case

        $this->assertEquals($expected); //pass case in

    }
}