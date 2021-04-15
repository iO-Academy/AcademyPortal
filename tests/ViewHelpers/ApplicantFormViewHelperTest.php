<?php

namespace Tests\ViewHelpers;

use Portal\ViewHelpers\ApplicantFormViewHelper;
use Tests\TestCase;

class ApplicantFormViewHelperTest extends TestCase
{
    public function testSuccessApplicantForm()
    {
        $stages = [
            ['id' => 1, 'title' => 'dummy-title', 'student' => "0"],
            ['id' => 2, 'title' => 'dummy-title-Two', 'student' => "1"]
        ];

        $stageOptions = [
            ['id' => 1, 'option' => 'dummy-option', 'stageId' => 1]
        ];

        $currentStage = 'dummy-option';

        $expected = '<optgroup label="dummy-title"><option data-student="0" name="stageId" value="1 1" selected>' .
                    'dummy-option</option>' .
                    '</optgroup>' .
                    '<option data-student="1" class="stageDropdown" name="stageId" value="2">dummy-title-Two</option>';

        $result = ApplicantFormViewHelper::stagesDropdown($stages, $stageOptions, $currentStage);

        // using DOMDocument means no whitespace issues
        $expectedHTML = new \DOMDocument();
        $expectedHTML->loadHTML($expected);

        $resultHTML = new \DOMDocument();
        $resultHTML->loadHTML($result);

        $this->assertEquals($expectedHTML, $resultHTML);
    }
}
