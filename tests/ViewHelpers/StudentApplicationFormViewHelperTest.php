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
        $expected = '<input type="text" placeholder="Full Name">' .
            '<input type="email" placeholder="Email"><input type="tel" placeholder="Phone Number">' .
            '<select><option>Gender</option>' .
            '<option value="1">male</option></select>';
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
        $expected = '<button disabled>Prev</button><button class="nextButton" ';
        $expected .= 'for="studentApplicationForm" value="2">Next</button>';
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
            'cohorts' => [['id' => '1', 'date' => '01/01/21']],
            'genders' => [['id' => '1', 'gender' => 'male']],
        ];
        $result = StudentApplicationFormViewHelper::displayForm(5, $data);
        $expected = '<div class="studentApplicationFormPages hidden" id="1">';
        $expected .= '<input type="text" placeholder="Full Name"><input ';
        $expected .= 'type="email" placeholder="Email"><input type="tel" ';
        $expected .= 'placeholder="Phone Number"><select><option>Gender</option>';
        $expected .= '<option value="1">male</option></select><button disabled>';
        $expected .= 'Prev</button><button class="nextButton" ';
        $expected .= 'for="studentApplicationForm" value="2">Next</button>';
        $expected .= '</div><div class="studentApplicationFormPages hidden" ';
        $expected .= 'id="2"><select><option>Background</option><option value="1">';
        $expected .= 'hello</option></select><div><label>Why do you want to become ';
        $expected .= 'a developer?</label></div><textarea rows="10" placeholder="(100-';
        $expected .= '500 Characters)"> </textarea></label><button class="prevButton" ';
        $expected .= 'value="1">Prev</button><button class="nextButton" ';
        $expected .= 'for="studentApplicationForm" value="3">Next</button></div>';
        $expected .= '<div class="studentApplicationFormPages hidden" id="3"><div>';
        $expected .= '<label>Any past coding experience?</label></div><textarea ';
        $expected .= 'rows="10" placeholder="Most people write a few sentences"> ';
        $expected .= '</textarea></label><button class="prevButton" value="2">Prev';
        $expected .= '</button><button class="nextButton" for="studentApplication';
        $expected .= 'Form" value="4">Next</button></div><div class="studentApplic';
        $expected .= 'ationFormPages hidden" id="4"><label>Select start date(s)</label>';
        $expected .= '<label><input type="checkbox" value="1"/>01/01/21</label><label>';
        $expected .= '<input type="checkbox" value="next available online course">Some ';
        $expected .= 'course dates may also be offered with a remote option. Contact us ';
        $expected .= 'to find out more.</label><label> How did you hear about us?</label>';
        $expected .= '<select><option>Background</option><option value="1">Google</option>';
        $expected .= '</select><label><input type="checkbox" value="I am eligible to live ';
        $expected .= 'and work in the UK"/>I am eligible to live and work in the UK</label>';
        $expected .= '<label><input type="checkbox" value="I confirm that I am at least 18 ';
        $expected .= 'years of age before my chosen course start date"/>I confirm that I am ';
        $expected .= 'at least 18 years of age before my chosen course start date<label><p>By ';
        $expected .= 'using this form you agree with the storage and handling of your data ';
        $expected .= 'by this website in accordance with our terms and conditions and ';
        $expected .= 'privacy policy.</p><label><input type="checkbox" value="I accept ';
        $expected .= 'the terms and conditions"/>I accept the terms and conditions</label>';
        $expected .= '<button class="prevButton" value="3">Prev</button><button class="next';
        $expected .= 'Button" for="studentApplicationForm" value="5">Next</button></div>';
        $expected .= '<div class="studentApplicationFormPages hidden" id="5"><h2>Ready to ';
        $expected .= 'submit?</h2><p>Next Steps</p><ul><li>We’ll read through your applicat';
        $expected .= 'ion and be in touch within the next few days.</li><li>We will send yo';
        $expected .= 'u our problem-solving test via email. You’ll have ten days to complete ';
        $expected .= 'this. (Don’t worry, no coding knowledge needed!)</li><li>We will also a';
        $expected .= 'rrange an informal chat between you and one of our trainers.</li><li>';
        $expected .= 'After your chat with a trainer, we will be in touch within five workin';
        $expected .= 'g days to let you know whether your application has been successful and ';
        $expected .= 'talk next steps!</li></ul><button class="prevButton" value="4">Prev</button>';
        $expected .= '<button class="finishButton" type="submit">Finish</button></div>';
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
