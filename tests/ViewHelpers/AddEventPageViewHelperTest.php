<?php
use PHPUnit\Framework\TestCase;
use Portal\ViewHelpers\AddEventPageViewHelper;

class AddEventPageViewHelperTest extends TestCase
{
    public $array = [
        ['id' => 1, 'type' => 'Hiring Partner'],
        ['id' => 2, 'type' => 'Other']
    ];
    public function testOutputSizeBrackets() {
        $case = AddEventPageViewHelper::populateDropdown($this->array);
        $this->assertEquals('<option value="1">Hiring Partner</option><option value="2">Other</option>', $case);
    }
}