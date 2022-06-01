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
        $expected = '<div class="row buttons"><button class="btn btn-lg saveProgress">Save</button><button clas';
        $expected .= 's="btn btn-lg" disabled>Back</button><button class="nextButton btn btn-lg" data-buttontype';
        $expected .= '="next" type="submit" for="studentApplicationForm" value="2" data-page="1">Next</button></';
        $expected .= 'div>';

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
        $expected = '<div class="studentApplicationFormPages hidden" id="1"><div class="row "><input id="name" ';
        $expected .= 'name="name" type="text" class="submitApplicant" placeholder="Full Name" class="form-contro';
        $expected .= 'l"></div><div id="nameError" data-field="name" class="alert hidden formItem_alert">Field R';
        $expected .= 'equired.</div><div class="row"><input id="email" name="email" type="email" class="submitAp';
        $expected .= 'plicant" placeholder="Email" class="form-control"></div><div id="emailError" data-field="E';
        $expected .= 'mail" class="alert hidden formItem_alert">Field Required.</div><div class="row"><input id=';
        $expected .= '"phoneNumber" name="phoneNumber" type="tel" class="submitApplicant" placeholder="Phone Num';
        $expected .= 'ber" class="form-control"></div><div id="phoneError" data-field="phone number" class="aler';
        $expected .= 't hidden formItem_alert">Field Required.</div><div class="row"><select id="gender" name="g';
        $expected .= 'ender" class="form-control submitApplicant" ><option value="" disabled selected>Gender</op';
        $expected .= 'tion><option value="1">male</option></select></div><div id="genderError" class="alert hidd';
        $expected .= 'en formItem_alert">Field Required.</div><div class="row buttons"><button class="btn btn-lg';
        $expected .= ' saveProgress">Save</button><button class="btn btn-lg" disabled>Back</button><button class';
        $expected .= '="nextButton btn btn-lg" data-buttontype="next" type="submit" for="studentApplicationForm"';
        $expected .= ' value="2" data-page="1">Next</button></div></div><div class="studentApplicationFormPages ';
        $expected .= 'hidden" id="2"><div class="row"><select id="backgroundInfo" name="backgroundInfoId" class=';
        $expected .= '"form-control submitApplicant"><option value="" disabled selected>Background</option><opti';
        $expected .= 'on value="1">hello</option></select></div><div id="backgroundError" class="alert hidden fo';
        $expected .= 'rmItem_alert">Field Required.</div><div class="row form-group"><label for="whyDev" class="';
        $expected .= 'label-control">Why do you want to become a developer?</label><textarea id="whyDev" name="w';
        $expected .= 'hyDev" type="text" placeholder="(100 - 500 characters)" class="form-control textAreaToCoun';
        $expected .= 't submitApplicant" rows="5"></textarea><div class="textAreaCounter"><span id="textAreaCoun';
        $expected .= 't">0</span> of 500 max characters</div><div id="whyDevError" class="alert hidden formItem_';
        $expected .= 'alert"></div></div><div class="row buttons"><button class="btn btn-lg saveProgress">Save</';
        $expected .= 'button><button class="btn btn-lg prevButton" value="1">Back</button><button class="nextBut';
        $expected .= 'ton btn btn-lg" data-buttontype="next" type="submit" for="studentApplicationForm" value="3';
        $expected .= '" data-page="2">Next</button></div></div><div class="studentApplicationFormPages hidden" i';
        $expected .= 'd="3"><div class="row"><label for="pastCoding" class="label-control withTooltip">Any past ';
        $expected .= 'coding experience?<div class="toolTipContainer"><p class="pastCodingTooltip" data-toggle="';
        $expected .= 'tooltip" data-placement="top" title="Taken an online course? Given WordPress a try? Our co';
        $expected .= 'urses require no past experience, but it would be useful to know about any existing knowle';
        $expected .= 'dge.">?</p></div></label><textarea id="pastCoding" name="codeExperience" placeholder="Most';
        $expected .= ' people write a few sentences" class="form-control submitApplicant" rows="5"></textarea><d';
        $expected .= 'iv id="codeExperienceError" class="alert hidden formItem_alert"></div></div><div class="ro';
        $expected .= 'w buttons"><button class="btn btn-lg saveProgress">Save</button><button class="btn btn-lg ';
        $expected .= 'prevButton" value="2">Back</button><button class="nextButton btn btn-lg" data-buttontype="';
        $expected .= 'next" type="submit" for="studentApplicationForm" value="4" data-page="3">Next</button></di';
        $expected .= 'v></div><div class="studentApplicationFormPages hidden" id="4"><div id="cohorts" class="ro';
        $expected .= 'w"><label>Select start date(s)</label><ul data-nextcourse="false" class="startDatesList"><';
        $expected .= 'li><label class="cohort_checkbox"><input name="cohort" type="checkbox" class="startDatesCh';
        $expected .= 'eckbox cohort_checkbox submitApplicant" value="1"/>Fri 1 Feb 2019</label></li></ul><div id';
        $expected .= '="cohortError" class="alert hidden formItem_alert"></div><p id="pageFourSmallPrint">Some c';
        $expected .= 'ourse dates may also be offered with a remote option. Contact us to find out more.</p></di';
        $expected .= 'v><div class="row"><label> How did you hear about us?</label><select id="hearAboutId" name';
        $expected .= '="hearAboutId" class="form-control submitApplicant"><option value="" disabled selected>Pic';
        $expected .= 'k one</option><option value="1">Google</option></select></div><div id="hearAboutError" cla';
        $expected .= 'ss="alert hidden formItem_alert"></div><div class="row hidden" id="additionalNotesWordOfMo';
        $expected .= 'uth"><label for="additionalNotesWordOfMouthInput">Who referred you?</label><input type="te';
        $expected .= 'xt" class="form-control submitApplicant" id="additionalNotesWordOfMouthInput" name="additi';
        $expected .= 'onalNotes"></div><div class="row hidden" id="additionalNotesOther"><label for="additionalN';
        $expected .= 'otesOtherInput">Please specify further</label><input type="text" class="form-control submi';
        $expected .= 'tApplicant" id="additionalNotesOtherInput" name="additionalNotes"></div><div id="notesErro';
        $expected .= 'r" class="alert hidden formItem_alert"></div><div class="termsAndConditions"><div class="r';
        $expected .= 'ow"><label for="eligibilityTooltip"class="label-control withTooltip"><div class="ukEligibi';
        $expected .= 'lity"><input id="eligibleCheck" name="eligible"type="checkbox" class="submitApplicant"valu';
        $expected .= 'e="I am eligible to live and work in the UK"/>I am eligible to live and work in the UK</di';
        $expected .= 'v><div class="toolTipContainer"><p class="eligibilityTooltip" data-toggle="tooltip" data-p';
        $expected .= 'lacement="top" title=""data-original-title="While not required, this may affect your abili';
        $expected .= 'ty to get a job in the UK after the course."aria-describedby="tooltip173013">?</p></div><d';
        $expected .= 'iv class="tooltip fade top in" role="tooltip" id="tooltip173013"style="top: 324.188px; lef';
        $expected .= 't: 988px; display: block;"></div></label></div><div id="UKWorkError" class="alert hidden f';
        $expected .= 'ormItem_alert"></div><div class="row"><label><input id="eighteenPlusCheck" name="eighteenP';
        $expected .= 'lus" class="submitApplicant" type="checkbox" />I confirm that I am at least 18 years of ag';
        $expected .= 'e before my chosen course start date</label></div><div id="18Error" class="alert hidden fo';
        $expected .= 'rmItem_alert"></div><div class="row"><p id="pageFourSmallPrint">By using this form you agr';
        $expected .= 'ee with the storage and handling of your data by this website in accordance with our <a hr';
        $expected .= 'ef="https://io-academy.uk/terms-conditions" target="_blank">terms and conditions</a> and <';
        $expected .= 'a href="https://io-academy.uk/privacy-policy" target="_blank">privacy policy</a>.</p><labe';
        $expected .= 'l><input id="termsAndConditionsCheck" type="checkbox" class="submitApplicant" value="I acc';
        $expected .= 'ept the terms and conditions"/>I accept the terms and conditions</label></div></div><div i';
        $expected .= 'd="termsConditionsError" class="alert hidden formItem_alert"></div><div class="row buttons';
        $expected .= '"><button class="btn btn-lg saveProgress">Save</button><button class="btn btn-lg prevButto';
        $expected .= 'n" value="3">Back</button><button class="nextButton btn btn-lg" data-buttontype="next" typ';
        $expected .= 'e="submit" for="studentApplicationForm" value="5" data-page="4">Next</button></div></div><';
        $expected .= 'div class="studentApplicationFormPages hidden" id="5"><div class="finalPage"><h2>Ready to ';
        $expected .= 'submit?</h2><p class="nextSteps">Next Steps</p><ul><li>We’ll read through your applicati';
        $expected .= 'on and be in touch within the next few days.</li><li>We will send you our problem-solving ';
        $expected .= 'test via email. You’ll have ten days to complete this. (Don’t worry, no coding knowled';
        $expected .= 'ge needed!)</li><li>We will also arrange an informal chat between you and one of our train';
        $expected .= 'ers.</li><li>After your chat with a trainer, we will be in touch within five working days ';
        $expected .= 'to let you know whether your application has been successful and talk next steps!</li></ul';
        $expected .= '></div><div id="generalError" class="hidden"></div><div class="row buttons"><button class=';
        $expected .= '"btn btn-lg saveProgress">Save</button><button class="btn btn-lg prevButton" value="4">Bac';
        $expected .= 'k</button><button class="btn btn-lg finishButton"id="submitApplicant">Submit Application</';
        $expected .= 'button></div></div></div>';
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
