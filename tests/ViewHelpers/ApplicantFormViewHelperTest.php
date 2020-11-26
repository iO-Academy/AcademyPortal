<?php

//this is a joke

namespace Tests\ViewHelpers;

use Portal\ViewHelpers\ApplicantFormViewHelper;
use Tests\TestCase;

class ApplicantFormViewHelperTest extends TestCase
{
    public function testSuccessApplicantForm()
    {
        $stages = [
            'string' => ['id' => 1, 'title' => 'dummy-title'],
            'stringTwo' => ['id' => 2, 'title' => 'dummy-title-Two']
        ];

        $stageOptions = [
            'stringThree' => ['id' => 1, 'option' => 'dummy-option', 'stageId' => 1]
        ];

        $expected = '<optgroup label="' . $stages['string']['title'] . '"><option name="stageId" value="' .
            $stages['string']['id'] . " " . $stageOptions['stringThree']['id'] . '">'.
            $stageOptions['stringThree']['option'] . '</option></optgroup><option class="stageDropdown" name="stageId" 
        value="' . $stages['stringTwo']['id'] . '">' . $stages['stringTwo']['title'] . '</option>';

        $result = ApplicantFormViewHelper::stagesDropdown($stages, $stageOptions);
        $this->assertEquals($expected, $result);
    }
}
