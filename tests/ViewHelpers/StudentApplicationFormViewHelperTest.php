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
        $expected = '<div class="row "><input id="name" name="name" type="text" class="submitApplicant" ';
        $expected .= 'placeholder="Full Name" class="form-control"></div><div id="nameError" data-fie';
        $expected .= 'ld="name" class="alert hidden formItem_alert">Field Requi';
        $expected .= 'red.</div><div class="row"><input id="email" name="email" type="email" class="submitApplicant" ';
        $expected .= 'placeholder="Email" class="form-control"></div><div id="emailE';
        $expected .= 'rror" data-field="Email" class="alert hidden formItem_ale';
        $expected .= 'rt">Field Required.</div><div class="row"><input id="phoneNumber" name="phoneNumber" ';
        $expected .= 'type="tel" class="submitApplicant" placeholder="Phone Number" class="form-control">';
        $expected .= '</div><div id="phoneError" data-field="phone number" clas';
        $expected .= 's="alert hidden formItem_alert">Field Required.</div><d';
        $expected .= 'iv class="row"><select id="gender" name="gender" class="form-control submitApplicant" ><option v';
        $expected .= 'alue="" disabled selected>Gender</option><option valu';
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
        $expected = '<div class="row buttons"><button class="btn btn-lg" disabled>Back</button>';
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
        $expected = '<div class="studentApplicationFormPages hidden" id="1"><div class="row "><input id="name" ' .
        'name="name" type="text" class="submitApplicant" placeholder="Full Name" class="form-control"></div><div ' .
        'id="nameError" data-field="name" class="alert hidden formItem_alert">Field Required.' .
        '</div><div class="row"><input id="email" name="email" type="email" class="submitApplicant" ' .
        'placeholder="Email" class="form-control">' .
        '</div><div id="emailError" data-field="Email" class="alert hidden formItem_alert">Field Required.</div>' .
        '<div class="row"><input id="phoneNumber" name="phoneNumber" type="tel" class="submitApplicant" ' .
        'placeholder="Phone Number" class="form-control"></div><div id="phoneError" data-field="phone number" ' .
        'class="alert hidden formItem_alert">Field Required.</div><div class="row">' .
        '<select id="gender" name="gender" ' .
        'class="form-control submitApplicant" ><option value="" disabled selected>' .
        'Gender</option><option value="1">' .
        'male</option></select></div><div id="genderError" ' .
        'class="alert hidden formItem_alert">Field Required.</div>' .
        '<div class="row buttons"><button class="btn btn-lg" disabled>Back</button>' .
        '<button class="nextButton btn btn-lg"' .
        ' data-buttontype="next" type="submit" for="studentApplicationForm" ' .
        'value="2" data-page="1">Next</button></div>' .
        '</div><div class="studentApplicationFormPages hidden" id="2">' .
        '<div class="row"><select id="backgroundInfo" ' .
        'name="backgroundInfoId" class="form-control submitApplicant"><option ' .
        'value="" disabled selected>Background' .
        '</option><option value="1">hello</option></select></div><div id="backgroundError" ' .
        'class="alert hidden formItem_alert">Field Required.</div><div ' .
        'class="row form-group"><label for="whyDev" ' .
        'class="label-control">Why do you want to become a developer?</label><textarea id="whyDev" name="whyDev" ' .
        'type="text" placeholder="(100 - 500 characters)" class="form-control textAreaToCount submitApplicant" ' .
        'rows="5"></textarea><div class="textAreaCounter"><span id="textAreaCount">0</span> of 500 max characters' .
        '</div><div id="whyDevError" class="alert hidden formItem_alert">' .
        '</div></div><div class="row buttons"><button ' .
        'class="btn btn-lg prevButton" value="1">Back</button><button class="nextButton btn btn-lg" ' .
        'data-buttontype="next" type="submit" for="studentApplicationForm" value="3" data-page="2">Next</button>' .
        '</div></div><div class="studentApplicationFormPages hidden" id="3">' .
        '<div class="row"><label for="pastCoding" ' .
        'class="label-control withTooltip">Any past coding experience?<div class="toolTipContainer">' .
        '<p class="pastCodingTooltip" data-toggle="tooltip"' .
        ' data-placement="top" title="Taken an online course? Given WordPress a try? ' .
        'Our courses require no past experience, but it would be useful to know about any existing knowledge.">' .
        '?</p></div></label><textarea id="pastCoding" name="codeExperience" ' .
        'placeholder="Most people write a few sentences" ' .
        'class="form-control submitApplicant" rows="5"></textarea><div ' .
        'id="codeExperienceError" class="alert hidden ' .
        'formItem_alert"></div></div><div class="row buttons">' .
        '<button class="btn btn-lg prevButton" value="2">Back' .
        '</button><button class="nextButton btn btn-lg" data-buttontype="next" type="submit" ' .
        'for="studentApplicationForm" value="4" data-page="3">Next</button></div></div><div ' .
        'class="studentApplicationFormPages hidden" id="4"><div id="cohorts" class="row">' .
        '<label>Select start date(s)</label><ul data-nextcourse="false" class="startDatesList">' .
        '<li><label class="cohort_checkbox"><input name="cohort" type="checkbox" class="startDatesCheckbox ' .
        'cohort_checkbox submitApplicant" value="1"/>Fri 1 Feb 2019</label></li></ul><div id="cohortError" ' .
        'class="alert hidden formItem_alert"></div><p id="pageFourSmallPrint">' .
        'Some course dates may also be offered ' .
        'with a remote option. Contact us to find out more.</p></div><div class="row">' .
        '<label> How did you hear about us?' .
        '</label><select id="hearAboutId" name="hearAboutId" class="form-control submitApplicant"><option value="" ' .
        'disabled selected>Pick one</option><option value="1">Google</option></select></div><div id="hearAboutError" ' .
        'class="alert hidden formItem_alert"></div><div class="row hidden" id="additionalNotesWordOfMouth"><label ' .
        'for="additionalNotesWordOfMouthInput">Who referred you?</label><input type="text" class="form-control ' .
        'submitApplicant" id="additionalNotesWordOfMouthInput" name="additionalNotes"></div><div class="row hidden" ' .
        'id="additionalNotesOther"><label for="additionalNotesOtherInput">Please specify further</label><input ' .
        'type="text" class="form-control submitApplicant" id="additionalNotesOtherInput" name="additionalNotes">' .
        '</div><div id="notesError" class="alert hidden formItem_alert"></div><div class="termsAndConditions">' .
        '<div class="row"><label for="eligibilityTooltip"' .
        'class="label-control withTooltip"><div class="ukEligibility">' .
        '<input name="eligible"type="checkbox" class="submitApplicant"value="I am eligible to live and work in the ' .
        'UK"/>I am eligible to live and work in the UK</div><div ' .
        'class="toolTipContainer"><p class="eligibilityTooltip" ' .
        'data-toggle="tooltip" data-placement="top" title=""data-original-title="While not required, this may affect ' .
        'your ability to get a job in the UK after the course."aria-describedby="tooltip173013">?</p></div><div ' .
        'class="tooltip fade top in" role="tooltip" id="tooltip173013"style="top: 324.188px; left: 988px; display: ' .
        'block;"></div></label></div><div id="UKWorkError" ' .
        'class="alert hidden formItem_alert"></div><div class="row">' .
        '<label><input name="eighteenPlus" class="submitApplicant" type="checkbox" />I confirm that I am at least 18 ' .
        'years of age before my chosen course start date</label></div><div id="18Error" class="alert hidden ' .
        'formItem_alert"></div><div class="row"><p id="pageFourSmallPrint">By using this form you agree with the ' .
        'storage and handling of your data by this website in accordance with our <a href="https://io-academy.uk' .
        '/terms-conditions" target="_blank">terms and conditions</a> and ' .
        '<a href="https://io-academy.uk/privacy-policy" ' .
        'target="_blank">privacy policy</a>.</p><label><input type="checkbox" class="submitApplicant" ' .
        'value="I accept ' .
        'the terms and conditions"/>I accept the terms and conditions</label></div></div><div ' .
        'id="termsConditionsError" class="alert hidden formItem_alert"></div><div class="row buttons">' .
        '<button class="btn btn-lg prevButton" value="3">Back</button><button class="nextButton btn btn-lg" ' .
        'data-buttontype="next" type="submit" for="studentApplicationForm" value="5" data-page="4">' .
        'Next</button></div>' .
        '</div><div class="studentApplicationFormPages hidden" id="5"><div class="finalPage"><h2>Ready to submit?' .
        '</h2><p class="nextSteps">Next Steps</p><ul><li>We’ll read through your application and be in touch within ' .
        'the next few days.</li><li>We will send you our problem-solving test via email. You’ll have ten days to ' .
        'complete this. (Don’t worry, no coding knowledge needed!)</li><li>We will also arrange an informal chat ' .
        'between you and one of our trainers.</li>' .
        '<li>After your chat with a trainer, we will be in touch within five ' .
        'working days to let you know whether your application has been successful and talk next steps!</li></ul>' .
        '</div><div id="generalError" hidden></div><div class="row buttons"><button class="btn btn-lg prevButton" ' .
        'value="4">Back</button><button class="btn btn-lg finishButton"id="submitApplicant">Submit Application' .
        '</button></div></div></div>';

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
