<?php

namespace Tests\ViewHelpers;

use Portal\ViewHelpers\StudentApplicationFormViewHelper;
use Tests\TestCase;
use TypeError;

class StudentApplicationFormViewHelperTest extends TestCase
{
    public function testSuccessDisplayPageByNumberTest()
    {
        $data = [
            'backgroundInfo' => [['id' => '1', 'backgroundInfo' => 'hello']],
            'hearAbout' => [['id' => '1', 'hearAbout' => 'Google']],
            'cohorts' => [['id' => '1', 'date' => '01/01/21']],
            'genders' => [['id' => '1', 'gender' => 'male']],
        ];
        $result = StudentApplicationFormViewHelper::displayPageByNumber(1, $data);
        $expected = '<div class="row "><input type="text" placeholder="Full Name" ';
        $expected .= 'class="form-control"></div><div class="row"><input type="email" ';
        $expected .= 'placeholder="Email" class="form-control"></div><div class="row">';
        $expected .= '<input type="tel" placeholder="Phone Number" class="form-control" name="name">';
        $expected .= '</div><div class="row"><select class="form-control" >';
        $expected .= '<option value="" disabled selected>Gender</option>';
        $expected .= '<option value="1">male</option></select></div>';
        $this->assertEquals($expected, $result);
    }

    public function testMalformedDisplayPageByNumberTest()
    {
        $string = 'hello';
        $data = [
            'backgroundInfo' => [['id' => '1', 'backgroundInfo' => 'hello']],
            'hearAbout' => [['id' => '1', 'hearAbout' => 'Google']],
            'cohorts' => [['id' => '1', 'date' => '01/01/21']],
            'genders' => [['id' => '1', 'gender' => 'male']],
        ];
        $this->expectException(TypeError::class);
        $actual = StudentApplicationFormViewHelper::displayPageByNumber($string, $data);
    }

    public function testSuccessDisplayNextButtons()
    {
        $result = StudentApplicationFormViewHelper::displayNextButtons(1, 5);
        $expected = '<div class="row buttons"><button class="btn btn-lg" disabled>Prev</button>';
        $expected .= '<button class="nextButton btn btn-lg" type="submit"';
        $expected .= ' for="studentApplicationForm" value="2">Next</button></div>';
        $this->assertEquals($expected, $result);
    }

    public function testMalformedDisplayNextButtons()
    {
        $string = 'hello';
        $int = 5;
        $this->expectException(TypeError::class);
        $actual = StudentApplicationFormViewHelper::displayNextButtons($string, $int);
    }

    public function testSuccessDisplayForm()
    {
        $data = [
            'backgroundInfo' => [['id' => '1', 'backgroundInfo' => 'hello']],
            'hearAbout' => [['id' => '1', 'hearAbout' => 'Google']],
            'cohorts' => [['id' => '1', 'date' => '2019-02-01']],
            'genders' => [['id' => '1', 'gender' => 'male']],
        ];
        $result = StudentApplicationFormViewHelper::displayForm(5, $data);
        $expected = '<div class="studentApplicationFormPages hidden" id="1">';
        $expected .= '<div class="row "><input type="text" placeholder="Full Name" ';
        $expected .= 'class="form-control"></div><div class="row"><input type="email"';
        $expected .= ' placeholder="Email" class="form-control"></div><div class="row">';
        $expected .= '<input type="tel" placeholder="Phone Number" class="form-control" name="name">';
        $expected .= '</div><div class="row"><select class="form-control" ><option value="" ';
        $expected .= 'disabled selected>Gender</option><option value="1">male</option>';
        $expected .= '</select></div><div class="row buttons"><button class="btn btn-lg"';
        $expected .= ' disabled>Prev</button><button class="nextButton btn btn-lg" ';
        $expected .= 'type="submit" for="studentApplicationForm" value="2">Next</button>';
        $expected .= '</div></div><div class="studentApplicationFormPages hidden" id="2">';
        $expected .= '<div class="row"><select class="form-control"><option value="" disabled';
        $expected .= ' selected>Background</option><option value="1">hello</option></select>';
        $expected .= '</div><div class="row form-group"><label for="whyDev" class="label-control">';
        $expected .= 'Why do you want to become a developer?</label><textarea id="whyDev" ';
        $expected .= 'type="text" placeholder="(100 - 500 characters)" class="form-control';
        $expected .= ' textAreaToCount" rows="5"></textarea><div class="textAreaCounter">';
        $expected .= '<span id="textAreaCount">0</span> of 500 max characters</div></div>';
        $expected .= '<div class="row buttons"><button class="btn btn-lg prevButton" value="1">';
        $expected .= 'Prev</button><button class="nextButton btn btn-lg" type="submit" ';
        $expected .= 'for="studentApplicationForm" value="3">Next</button></div></div>';
        $expected .= '<div class="studentApplicationFormPages hidden" id="3"><div class="row">';
        $expected .= '<label for="pastCoding" class="label-control withTooltip">';
        $expected .= 'Any past coding experience?<p class="pastCodingTooltip" data-toggle="tooltip"';
        $expected .= ' data-placement="top" title="Taken an online course? Given WordPress';
        $expected .= ' a try? Our courses require no past experience, but it would be useful';
        $expected .= ' to know about any existing knowledge.">?</p></label><textarea id="pastCoding"';
        $expected .= ' placeholder="Most people write a few sentences" class="form-control" rows="5">';
        $expected .= '</textarea></div><div class="row buttons"><button class="btn btn-lg prevButton"';
        $expected .= ' value="2">Prev</button><button class="nextButton btn btn-lg" type="submit" ';
        $expected .= 'for="studentApplicationForm" value="4">Next</button></div></div><div ';
        $expected .= 'class="studentApplicationFormPages hidden" id="4"><div class="row"><label>';
        $expected .= 'Select start date(s)</label><ul class="startDatesList"><li><label><input ';
        $expected .= 'type="checkbox" class="startDatesCheckbox" name="startDatesCheckbox" value="1"/>';
        $expected .= 'Fri 1 Feb 2019</label></li><li><label><input type="checkbox" class="startDatesCheckbox"';
        $expected .= ' name="startDatesCheckbox" value="register interest">';
        $expected .= 'next available online course (register interest)</label></li>';
        $expected .= '</ul><p>Some course dates may also be offered with a remote option.';
        $expected .= ' Contact us to find out more.</p></div><div class="row"><label> ';
        $expected .= 'How did you hear about us?</label><select class="form-control">';
        $expected .= '<option value="" disabled selected>Background</option><option value="1">';
        $expected .= 'Google</option></select></div><div class="row hidden"><label ';
        $expected .= 'for="additionalNotesWordOfMouth">Who referred you?</label><input type="text" ';
        $expected .= 'class="form-control" id="additionalNotesWordOfMouth" name="additionalNotes">';
        $expected .= '</div><div class="row hidden"><label for="additionalNotesOther">';
        $expected .= 'Please specify further</label><input type="text" class="form-control"';
        $expected .= ' id="additionalNotesOther" name="additionalNotes"></div><div class="termsAndConditions">';
        $expected .= '<div class="row"><label><input type="checkbox" value="I am eligible to ';
        $expected .= 'live and work in the UK"/>I am eligible to live and work in the UK</label>';
        $expected .= '</div><div class="row"><label><input type="checkbox" value="I confirm that';
        $expected .= ' I am at least 18 years of age before my chosen course start date"/>';
        $expected .= 'I confirm that I am at least 18 years of age before my chosen course start date';
        $expected .= '</label></div><div class="row"><p>By using this form you agree with the storage ';
        $expected .= 'and handling of your data by this website in accordance with our ';
        $expected .= '<a href="https://io-academy.uk/terms-conditions" target="_blank">terms and conditions';
        $expected .= '</a> and <a href="https://io-academy.uk/privacy-policy" target="_blank">privacy policy';
        $expected .= '</a>.</p><label><input type="checkbox" value="I accept the terms and conditions"/>';
        $expected .= 'I accept the terms and conditions</label></div></div><div class="row buttons">';
        $expected .= '<button class="btn btn-lg prevButton" value="3">Prev</button><button';
        $expected .= ' class="nextButton btn btn-lg" type="submit" for="studentApplicationForm" ';
        $expected .= 'value="5">Next</button></div></div><div class="studentApplicationFormPages';
        $expected .= ' hidden" id="5"><div class="finalPage"><h2>Ready to submit?</h2><p ';
        $expected .= 'class="nextSteps">Next Steps</p><ul><li>We’ll read through your application';
        $expected .= ' and be in touch within the next few days.</li><li>We will send you our ';
        $expected .= 'problem-solving test via email. You’ll have ten days to complete this. ';
        $expected .= '(Don’t worry, no coding knowledge needed!)</li><li>We will also arrange ';
        $expected .= 'an informal chat between you and one of our trainers.</li><li>After your';
        $expected .= ' chat with a trainer, we will be in touch within five working days to let';
        $expected .= ' you know whether your application has been successful and talk next steps!';
        $expected .= '</li></ul></div><div class="row buttons"><button class="btn btn-lg prevButton"';
        $expected .= ' value="4">Prev</button><button class="btn btn-lg finishButton">Finish</button>';
        $expected .= '</div></div></div>';
        $this->assertEquals($expected, $result);
    }

    public function testMalformedDisplayForm()
    {
        $string = 'hello';
        $data = [
            'backgroundInfo' => [['id' => '1', 'backgroundInfo' => 'hello']],
            'hearAbout' => [['id' => '1', 'hearAbout' => 'Google']],
            'cohorts' => [['id' => '1', 'date' => '01/01/21']],
            'genders' => [['id' => '1', 'gender' => 'male']],
        ];
        $this->expectException(TypeError::class);
        $actual = StudentApplicationFormViewHelper::displayForm($string, $data);
    }
}
