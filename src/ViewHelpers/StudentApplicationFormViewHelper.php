<?php

namespace Portal\ViewHelpers;

class StudentApplicationFormViewHelper
{
    /**
     * html to display the first question page
     *
     * @param array $data
     * @return string
     */
    protected static function displayPageFormOne(array $data): string
    {
        $output = '<div class="row "><input id="name" name="name" type="text" ';
        $output .= 'class="submitApplicant" placeholder="Full Name" class="form-control"></div>';
        $output .= '<div id="nameError" data-field="name" class="alert hidden formItem_alert">Field Required.</div>';
        $output .= '<div class="row"><input id="email" name="email" type="email" class="submitApplicant" ';
        $output .= 'placeholder="Email" class="form-control"></div>';
        $output .= '<div id="emailError" data-field="Email" class="alert hidden formItem_alert">Field Required.</div>';
        $output .= '<div class="row"><input id="phoneNumber" name="phoneNumber" type="tel" class="submitApplicant" ';
        $output .= 'placeholder="Phone Number" class="form-control"></div>';
        $output .= '<div id="phoneError" data-field="phone number" ';
        $output .= 'class="alert hidden formItem_alert">Field Required.</div>';
        $output .= '<div class="row"><select id="gender" name="gender" class="form-control submitApplicant" >';
        $output .= '<option value="" disabled selected>Gender</option>';
        foreach ($data['genders'] as $genders) {
            $output .= '<option value="' . $genders['id'] . '">' . $genders['gender'] . '</option>';
        }
        $output .= '</select></div>';
        $output .= '<div id="genderError" class="alert hidden formItem_alert">Field Required.</div>';
        return $output;
    }

    /**
     * html to display the second question page
     *
     * @param array $data
     * @return string
     */
    protected static function displayPageFormTwo(array $data): string
    {
        $output = '<div class="row"><select id="backgroundInfo" name="backgroundInfoId" class="form-control ';
        $output .= 'submitApplicant">';
        $output .= '<option value="" disabled selected>Background</option>';
        foreach ($data['backgroundInfo'] as $backgroundInfo) {
            $output .= '<option value="' . $backgroundInfo['id'] .
                '">' . $backgroundInfo['backgroundInfo'] . '</option>';
        }
        $output .= '</select></div>';
        $output .= '<div id="backgroundError" class="alert hidden formItem_alert">Field Required.</div>';
        $output .= '<div class="row form-group"><label for="whyDev" class="label-control">';
        $output .= 'Why do you want to become a developer?</label>';
        $output .= '<textarea id="whyDev" name="whyDev" type="text" placeholder="(100 - 500 characters)" ';
        $output .= 'class="form-control textAreaToCount submitApplicant" rows="5"></textarea>';
        $output .= '<div class="textAreaCounter"><span id="textAreaCount">0</span> of 500 max characters</div>';
        $output .= '<div id="whyDevError" class="alert hidden formItem_alert"></div>';
        $output .= '</div>';
        return $output;
    }

    /**
     * html to display the third question page
     *
     * @return string
     */
    protected static function displayPageFormThree(): string
    {
        $output = '<div class="row"><label for="pastCoding" class="label-control withTooltip">';
        $output .= 'Any past coding experience?';
        $output .= '<p class="pastCodingTooltip" data-toggle="tooltip" data-placement="top" ';
        $output .= 'title="Taken an online course? Given WordPress a try? Our courses require no past experience,';
        $output .= ' but it would be useful to know about any existing knowledge.">?</p></label>';
        $output .= '<textarea id="pastCoding" name="codeExperience" placeholder="Most people write a few sentences" ';
        $output .= 'class="form-control submitApplicant" rows="5"></textarea>';
        $output .= '<div id="codeExperienceError" class="alert hidden formItem_alert"></div>';
        $output .= '</div>';
        return $output;
    }

    /**
     * html to display the fourth question page
     *
     * @param array $data
     * @return string
     */
    protected static function displayPageFormFour(array $data): string
    {
        $output = '<div id="cohorts" class="row"><label>Select start date(s)</label><ul data-nextcourse="false"' .
            ' class="startDatesList">';
        foreach ($data['cohorts'] as $cohorts) {
            $output .= '<li><label class="cohort_checkbox"><input name="cohort" type="checkbox" ';
            $output .= 'class="startDatesCheckbox cohort_checkbox submitApplicant"';
            $output .= ' value="' . $cohorts['id'] . '"/>';
            $output .= date_format(date_create_from_format("Y-m-d", $cohorts['date']), "D j M Y");
            $output .= '</label></li>';
        }
        $output .= '</ul>';
        $output .= '<div id="cohortError" class="alert hidden formItem_alert"></div>';
        $output .= '<p>Some course dates may also be offered with a remote option. ';
        $output .= 'Contact us to find out more.</p></div>';
        $output .= '<div class="row"><label> How did you hear about us?</label>';
        $output .= '<select id="hearAboutId" name="hearAboutId" class="form-control submitApplicant">';
        $output .= '<option value="" disabled selected>Pick one</option>';
        foreach ($data['hearAbout'] as $hearAbout) {
            $output .= '<option value="' . $hearAbout['id'] . '">' . $hearAbout['hearAbout'] . '</option>';
        }
        $output .= '</select></div>';
        $output .= '<div id="hearAboutError" class="alert hidden formItem_alert"></div>';
        $output .= '<div class="row hidden" id="additionalNotesWordOfMouth">';
        $output .= '<label for="additionalNotesWordOfMouthInput">Who referred you?</label>';
        $output .= '<input type="text" class="form-control submitApplicant" ';
        $output .= 'id="additionalNotesWordOfMouthInput" name="additionalNotes">';
        $output .= '</div>';
        $output .= '<div class="row hidden" id="additionalNotesOther">';
        $output .= '<label for="additionalNotesOtherInput">Please specify further</label>';
        $output .= '<input type="text" class="form-control submitApplicant" ';
        $output .= 'id="additionalNotesOtherInput" name="additionalNotes"></div>';
        $output .= '<div id="notesError" class="alert hidden formItem_alert"></div>';
        $output .= '<div class="termsAndConditions"><div class="row"><label><input name="eligible" type="checkbox" ';
        $output .= 'class="submitApplicant"';
        $output .= 'value="I am eligible to live and work in the UK"/>I am eligible to live and work in the UK';
        $output .= '</label></div>';
        $output .= '<div id="UKWorkError" class="alert hidden formItem_alert"></div>';
        $output .= '<div class="row"><label><input name="eighteenPlus" class="submitApplicant" type="checkbox" />';
        $output .= 'I confirm that I am at least 18 ';
        $output .= 'years of age before my chosen course start date</label></div>';
        $output .= '<div id="18Error" class="alert hidden formItem_alert"></div>';
        $output .= '<div class="row"><p>By using this form you agree with the storage and handling of your ';
        $output .= 'data by this website in accordance with our <a href="https://io-academy.uk/terms-conditions" ';
        $output .= 'target="_blank">terms and conditions</a>';
        $output .= ' and <a href="https://io-academy.uk/privacy-policy" target="_blank">privacy policy</a>.</p>';
        $output .= '<label><input type="checkbox" class="submitApplicant" value="I accept the terms and conditions"/>';
        $output .= 'I accept the terms and conditions</label></div></div>';
        $output .= '<div id="termsConditionsError" class="alert hidden formItem_alert"></div>';
        return $output;
    }

    /**
     * html to display the fifth question page
     *
     * @return string
     */
    protected static function displayPageFormFive(): string
    {
        $output = '<div class="finalPage"><h2>Ready to submit?</h2>';
        $output .= '<p class="nextSteps">Next Steps</p>';
        $output .= '<ul>';
        $output .= '<li>We’ll read through your application and ' .
        'be in touch within the next few days.</li>';
        $output .= '<li>We will send you our problem-solving test via email. ' .
        'You’ll have ten days to complete this. (Don’t worry, no coding knowledge needed!)</li>';
        $output .= '<li>We will also arrange an informal chat ' .
        'between you and one of our trainers.</li>';
        $output .= '<li>After your chat with a trainer, we will be in touch within' .
        ' five working days to let you know whether your application' .
        ' has been successful and talk next steps!</li>';
        $output .= '</ul></div>';
        $output .= '<div id="generalError" class="hidden"></div>';
        return $output;
    }


    /**
     * selects a question page based on number and passes it the data array if needed.
     *
     * @param int $applicationFormPageNumber
     * @param array $data
     * @return string
     */
    public static function displayPageByNumber(int $applicationFormPageNumber, array $data): string
    {
        switch ($applicationFormPageNumber) {
            case 2:
                $output = self::displayPageFormTwo($data);
                break;
            case 3:
                $output = self::displayPageFormThree();
                break;
            case 4:
                $output = self::displayPageFormFour($data);
                break;
            case 5:
                $output = self::displayPageFormFive();
                break;
            default:
                $output = self::displayPageFormOne($data);
        }
        return $output;
    }

    /**
     * Displays the correct next buttons for a given page number and total number of pages.
     *
     * @param int $applicationFormPageNumber
     * @param int $finalPage
     * @return string
     */
    public static function displayNextButtons(int $applicationFormPageNumber, int $finalPage): string
    {
        if ($applicationFormPageNumber === 1) {
            $output = '<div class="row buttons"><button class="btn btn-lg" disabled>Prev</button>';
        } else {
            $output = '<div class="row buttons"><button class="btn btn-lg prevButton" value="';
            $output .= ($applicationFormPageNumber - 1) . '">Prev</button>';
        }
        if ($applicationFormPageNumber >= $finalPage) {
            $output .= '<button class="btn btn-lg finishButton" id="submitApplicant">Finish</button></div></div>';
        } else {
            $output .= '<button class="nextButton btn btn-lg" data-buttontype="next" ';
            $output .= 'type="submit" for="studentApplicationForm" value="';
            $output .= ($applicationFormPageNumber + 1) . '" data-page="';
            $output .=  $applicationFormPageNumber . '">Next</button></div>';
        }
        return $output;
    }

    /**
     * Displays all the form pages and next buttons in divs with a class of hidden
     *
     * @param int $pages
     * @param array $data
     * @return string
     */
    public static function displayForm(int $pages, array $data): string
    {
        $output = '';
        for ($i = 1; $i <= $pages; $i++) {
            $output .= '<div class="studentApplicationFormPages hidden" id="' . $i .  '">';
            $output .= self::displayPageByNumber($i, $data);
            $output .= self::displayNextButtons($i, $pages);
            $output .= '</div>';
        }
        return $output;
    }
}
