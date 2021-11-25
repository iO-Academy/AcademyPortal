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
        $expected = '<div class="row "><input type="text" placeholder="Full Name';
        $expected .= '" class="form-control"></div><div id="nameError" data-fie';
        $expected .= 'ld="name" class="alert hidden formItem_alert">Field Requi';
        $expected .= 'red.</div><div class="row"><input type="email" placeho';
        $expected .= 'lder="Email" class="form-control"></div><div id="emailE';
        $expected .= 'rror" data-field="Email" class="alert hidden formItem_ale';
        $expected .= 'rt">Field Required.</div><div class="row"><input typ';
        $expected .= 'e="tel" placeholder="Phone Number" class="form-control">';
        $expected .= '</div><div id="telError" data-field="phone number" clas';
        $expected .= 's="alert hidden formItem_alert">Field Required.</div><d';
        $expected .= 'iv class="row"><select class="form-control" ><option va';
        $expected .= 'lue="" disabled selected>Gender</option><option valu';
        $expected .= 'e="1">male</option></select></div><div id="genderE';
        $expected .= 'rror" class="alert hidden formItem_alert">Field Re';
        $expected .= 'quired.</div>';

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
        $expected .= '<button class="nextButton btn btn-lg" data-buttontype="next" ';
        $expected .= 'type="submit" for="studentApplicationForm" ';
        $expected .= 'value="2" data-page="1">Next</button></div>';
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
        $expected .= '<div class="row "><input type="text" placeholder="Full ';
        $expected .= 'Name" class="form-control"></div><div id="nameError" ';
        $expected .= 'data-field="name" class="alert hidden formItem_alert">';
        $expected .= 'Field Required.</div><div class="row"><input type="email" ';
        $expected .= 'placeholder="Email" class="form-control"></div><div ';
        $expected .= 'id="emailError" data-field="Email" class="alert ';
        $expected .= 'hidden formItem_alert">Field Required.</div><div ';
        $expected .= 'class="row"><input type="tel" placeholder="Phone ';
        $expected .= 'Number" class="form-control"></div><div id="telError" ';
        $expected .= 'data-field="phone number" class="alert hidden ';
        $expected .= 'formItem_alert">Field Required.</div><div class="row">';
        $expected .= '<select class="form-control" ><option value="" ';
        $expected .= 'disabled selected>Gender</option><option value="1">';
        $expected .= 'male</option></select></div><div id="genderError" ';
        $expected .= 'class="alert hidden formItem_alert">Field Required.';
        $expected .= '</div><div class="row buttons"><button class="btn btn-lg" ';
        $expected .= 'disabled>Prev</button><button class="nextButton btn btn-lg" ';
        $expected .= 'data-buttontype="next" type="submit" for="studentApplicationForm" ';
        $expected .= 'value="2" data-page="1">Next</button></div></div>';
        $expected .= '<div class="studentApplicationFormPages hidden" id="2">';
        $expected .= '<div class="row"><select class="form-control"><option ';
        $expected .= 'value="" disabled selected>Background</option><option ';
        $expected .= 'value="1">hello</option></select></div><div id="backgroundError" ';
        $expected .= 'class="alert hidden formItem_alert">Field Required.</div>';
        $expected .= '<div class="row form-group"><label for="whyDev" ';
        $expected .= 'class="label-control">Why do you want to become a ';
        $expected .= 'developer?</label><textarea id="whyDev" type="text" ';
        $expected .= 'placeholder="(100 - 500 characters)" class="form-control ';
        $expected .= 'textAreaToCount" rows="5"></textarea><div class="textAreaCounter">';
        $expected .= '<span id="textAreaCount">0</span> of 500 max characters</div>';
        $expected .= '<div id="whyDevError" class="alert hidden formItem_alert"></div>';
        $expected .= '</div><div class="row buttons"><button class="btn btn-lg ';
        $expected .= 'prevButton" value="1">Prev</button><button class="nextButton ';
        $expected .= 'btn btn-lg" data-buttontype="next" type="submit" ';
        $expected .= 'for="studentApplicationForm" value="3" data-page="2">';
        $expected .= 'Next</button></div></div><div class="studentApplicationFormPages ';
        $expected .= 'hidden" id="3"><div class="row"><label for="pastCoding" ';
        $expected .= 'class="label-control withTooltip">Any past coding experience?';
        $expected .= '<p class="pastCodingTooltip" data-toggle="tooltip" ';
        $expected .= 'data-placement="top" title="Taken an online course? ';
        $expected .= 'Given WordPress a try? Our courses require no past ';
        $expected .= 'experience, but it would be useful to know about any ';
        $expected .= 'existing knowledge.">?</p></label><textarea id="pastCoding" ';
        $expected .= 'placeholder="Most people write a few sentences" ';
        $expected .= 'class="form-control" rows="5"></textarea><div ';
        $expected .= 'id="codeExperienceError" class="alert hidden ';
        $expected .= 'formItem_alert"></div></div><div class="row buttons">';
        $expected .= '<button class="btn btn-lg prevButton" value="2">Prev';
        $expected .= '</button><button class="nextButton btn btn-lg" ';
        $expected .= 'data-buttontype="next" type="submit" for="studentApplicationForm" ';
        $expected .= 'value="4" data-page="3">Next</button></div></div>';
        $expected .= '<div class="studentApplicationFormPages hidden" ';
        $expected .= 'id="4"><div class="row"><label>Select start ';
        $expected .= 'date(s)</label><ul class="startDatesList"><li>';
        $expected .= '<label><input type="checkbox" data-nextcourse=';
        $expected .= '"false" class="startDatesCheckbox" name="start';
        $expected .= 'DatesCheckbox" value="1"/>Fri 1 Feb 2019</label>';
        $expected .= '</li><li><label><input type="checkbox" data-nextc';
        $expected .= 'ourse="true" class="startDatesCheckbox" name="sta';
        $expected .= 'rtDatesCheckbox" value="register interest">next ';
        $expected .= 'available online course (register interest)</label>';
        $expected .= '</li></ul><div id="startDateError" class="alert hi';
        $expected .= 'dden formItem_alert"></div><p>Some course dates ';
        $expected .= 'may also be offered with a remote option. Contact ';
        $expected .= 'us to find out more.</p></div><div class="row"><label>';
        $expected .= ' How did you hear about us?</label><select id="he';
        $expected .= 'arAbout" name="hearAbout" class="form-control"><o';
        $expected .= 'ption value="" disabled selected>Pick one</option><op';
        $expected .= 'tion value="1">Google</option></select></div><div id="h';
        $expected .= 'earAboutError" class="alert hidden formItem_alert"></d';
        $expected .= 'iv><div class="row hidden" id="additionalNotesWordOfM';
        $expected .= 'outh"><label for="additionalNotesWordOfMouthInput">Who';
        $expected .= ' referred you?</label><input type="text" class="form';
        $expected .= '-control" id="additionalNotesWordOfMouthInput" nam';
        $expected .= 'e="additionalNotes"></div><div class="row hidd';
        $expected .= 'en" id="additionalNotesOther"><label for="additio';
        $expected .= 'nalNotesOtherInput">Please specify further</label>';
        $expected .= '<input type="text" class="form-control" id="addit';
        $expected .= 'ionalNotesOtherInput" name="additionalNotes"></div>';
        $expected .= '<div id="additionalNotesError" class="alert hidde';
        $expected .= 'n formItem_alert"></div><div class="termsAndCondi';
        $expected .= 'tions"><div class="row"><label><input type="checkbo';
        $expected .= 'x" value="I am eligible to live and work in the UK';
        $expected .= '"/>I am eligible to live and work in the UK</label>';
        $expected .= '</div><div id="UKWorkError" class="alert hidden for';
        $expected .= 'mItem_alert"></div><div class="row"><label><input ty';
        $expected .= 'pe="checkbox" value="I confirm that I am at least 1';
        $expected .= '8 years of age before my chosen course start date"/>';
        $expected .= 'I confirm that I am at least 18 years of age before m';
        $expected .= 'y chosen course start date</label></div><div id="18';
        $expected .= 'Error" class="alert hidden formItem_alert"></div><';
        $expected .= 'div class="row"><p>By using this form you agree wit';
        $expected .= 'h the storage and handling of your data by this webs';
        $expected .= 'ite in accordance with our <a href="https://io-acad';
        $expected .= 'emy.uk/terms-conditions" target="_blank">terms and con';
        $expected .= 'ditions</a> and <a href="https://io-academy.uk/priva';
        $expected .= 'cy-policy" target="_blank">privacy policy</a>.</p>';
        $expected .= '<label><input type="checkbox" value="I accept th';
        $expected .= 'e terms and conditions"/>I accept the terms and co';
        $expected .= 'nditions</label></div></div><div id="termsCondition';
        $expected .= 'sError" class="alert hidden formItem_alert"></div>';
        $expected .= '<div class="row buttons"><button class="btn btn-lg pre';
        $expected .= 'vButton" value="3">Prev</button><button class="nextB';
        $expected .= 'utton btn btn-lg" data-buttontype="next" type="subm';
        $expected .= 'it" for="studentApplicationForm" value="5" data-pag';
        $expected .= 'e="4">Next</button></div></div><div class="studentA';
        $expected .= 'pplicationFormPages hidden" id="5"><div class="fina';
        $expected .= 'lPage"><h2>Ready to submit?</h2><p class="nextSteps">Nex';
        $expected .= 't Steps</p><ul><li>We’ll read through your applicatio';
        $expected .= 'n and be in touch within the next few days.</li>';
        $expected .= '<li>We will send you our problem-solving test via e';
        $expected .= 'mail. You’ll have ten days to complete this. (Don’t wo';
        $expected .= 'rry, no coding knowledge needed!)</li><li>We will al';
        $expected .= 'so arrange an informal chat between you and one of ou';
        $expected .= 'r trainers.</li><li>After your chat with a traine';
        $expected .= 'r, we will be in touch within five working days to le';
        $expected .= 't you know whether your application has been successfu';
        $expected .= 'l and talk next steps!</li></ul></div><div class="ro';
        $expected .= 'w buttons"><button class="btn btn-lg prevButton" va';
        $expected .= 'lue="4">Prev</button><button class="btn btn-lg fin';
        $expected .= 'ishButton">Finish</button></div></div></div>';
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
