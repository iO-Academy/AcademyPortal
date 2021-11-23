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
        $expected = '<input type="text" placeholder="Full Name">
<input type="email" placeholder="Email"><input type="tel"
 placeholder="Phone Number"><select><option>Gender</option>
 <option value="1">male</option></select>';
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
        $expected = '<button disabled>Prev</button>
<button class="nextButton" type="submit"
 for="studentApplicationForm" value="2">Next</button>';
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
        $expected = '<div class="studentApplicationFormPages hidden" id="1">
<input type="text" placeholder="Full Name"><input type="email" placeholder="Email">
<input type="tel" placeholder="Phone Number"><select><option>Gender</option>
<option value="1">male</option></select><button disabled>Prev</button>
<button class="nextButton" type="submit" for="studentApplicationForm" value="2">Next</button>
</div><div class="studentApplicationFormPages hidden" id="2"><select>
<option>Background</option><option value="1">hello</option></select>
<div><label>Why do you want to become a developer?</label>
</div><textarea rows="10" placeholder="(100-500 Characters)">
 </textarea></label><button class="prevButton" value="1">Prev</button>
 <button class="nextButton" type="submit" for="studentApplicationForm" value="3">Next</button>
 </div><div class="studentApplicationFormPages hidden" id="3"><div>
 <label>Any past coding experience?</label></div>
 <textarea rows="10" placeholder="Most people write a few sentences">
  </textarea></label><button class="prevButton" value="2">Prev</button>
  <button class="nextButton" type="submit" for="studentApplicationForm"
   value="4">Next</button></div><div class="studentApplicationFormPages
    hidden" id="4"><label>Select start date(s)</label>
    <label><input type="checkbox" value="1"/>01/01/21</label>
    <label><input type="checkbox" value="next available online 
    course">Some course dates may also be offered with a remote
     option. Contact us to find out more.</label><label>
      How did you hear about us?</label><select><option>Background
      </option><option value="1">Google</option></select>
      <label><input type="checkbox" value="I am eligible
       to live and work in the UK"/>I am eligible to live
        and work in the UK</label><label><input type="checkbox"
         value="I confirm that I am at least 18 years 
of age before my chosen course start date"/>
I confirm that I am at least 18 years 
of age before my chosen course start date<label>
<p>By using this form you agree with the storage
 and handling of your data
 by this website in accordance with our terms
  and conditions and privacy policy.</p><label>
  <input type="checkbox" value="I accept the terms
   and conditions"/>I accept the terms and conditions
   </label><button class="prevButton" value="3">Prev
   </button><button class="nextButton" type="submit"
    for="studentApplicationForm" value="5">Next</button></div>
    <div class="studentApplicationFormPages hidden" id="5">
    <h2>Ready to submit?</h2><p>Next Steps</p><ul>
    <li>We’ll read through your application and 
be in touch within the next few days.</li><li>We will
 send you our problem-solving test via email. 
You’ll have ten days to complete this. 
(Don’t worry, no coding knowledge needed!)</li>
<li>We will also arrange an informal chat 
between you and one of our trainers.</li>
<li>After your chat with a trainer, we will be in touch within
 five working days to let you know whether your application 
 has been successful and talk next steps!</li>
 </ul><button class="prevButton" value="4">Prev</button>
 <button class="finishButton">Finish</button></div>';
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
