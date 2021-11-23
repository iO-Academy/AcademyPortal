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
        $output = '<input type="text" placeholder="Full Name">';
        $output .= '<input type="email" placeholder="Email">';
        $output .= '<input type="tel" placeholder="Phone Number">';
        $output .= '<select>';
        $output .= '<option>Gender</option>';
        foreach ($data['genders'] as $genders) {
            $output .= '<option value="' . $genders['id'] . '">' . $genders['gender'] . '</option>';
        }
        $output .= '</select>';
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
        $output = '<select>';
        $output .= '<option>Background</option>';
        foreach ($data['backgroundInfo'] as $backgroundInfo) {
            $output .= '<option value="' . $backgroundInfo['id'] . '">' . $backgroundInfo['backgroundInfo'] . '</option>';
        }
        $output .= '</select>';
        $output .= '<div><label>Why do you want to become a developer?</label></div>';
        $output .= '<textarea rows="10" placeholder="(100-500 Characters)"> </textarea>';
        $output .= '</label>';
        return $output;
    }

    /**
     * html to display the third question page
     *
     * @return string
     */
    protected static function displayPageFormThree(): string
    {
        $output = '<div><label>Any past coding experience?</label></div>';
        $output .= '<textarea rows="10" placeholder="Most people write a few sentences"> </textarea>';
        $output .= '</label>';
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
        $output = '<label>Select start date(s)</label>';
        foreach ($data['cohorts'] as $cohorts) {
            $output .= '<label><input type="checkbox" value="' . $cohorts['id'] . '"/>' . $cohorts['date'] . '</label>';
        }
        $output .= '<label><input type="checkbox" value="next available online course">Some course dates may also be offered with a remote option. Contact us to find out more.</label>';
        $output .= '<label> How did you hear about us?</label>';
        $output .= '<select>';
        $output .= '<option>Background</option>';
        foreach ($data['hearAbout'] as $hearAbout) {
            $output .= '<option value="' . $hearAbout['id'] . '">' . $hearAbout['hearAbout'] . '</option>';
        }
        $output .= '</select>';
        $output .= '<label><input type="checkbox" value="I am eligible to live and work in the UK"/>I am eligible to live and work in the UK</label>';
        $output .= '<label><input type="checkbox" value="I confirm that I am at least 18 years 
of age before my chosen course start date"/>I confirm that I am at least 18 years 
of age before my chosen course start date<label>';
        $output .= '<p>By using this form you agree with the storage and handling of your data
 by this website in accordance with our terms and conditions and privacy policy.</p>';
        $output .= '<label><input type="checkbox" value="I accept the terms and conditions"/>I accept the terms and conditions</label>';
        return $output;
    }

    /**
     * html to display the fifth question page
     *
     * @return string
     */
    protected static function displayPageFormFive(): string
    {
        $output = '<h2>Ready to submit?</h2>';
        $output .= '<p>Next Steps</p>';
        $output .= '<ul>';
        $output .= '<li>We’ll read through your application and 
be in touch within the next few days.</li>';
        $output .= '<li>We will send you our problem-solving test via email. 
You’ll have ten days to complete this. (Don’t worry, no coding knowledge needed!)</li>';
        $output .= '<li>We will also arrange an informal chat 
between you and one of our trainers.</li>';
        $output .= '<li>After your chat with a trainer, we will be in touch within
 five working days to let you know whether your application 
 has been successful and talk next steps!</li>';
        $output .= '</ul>';
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
            $output = '<button disabled>Prev</button>';
        } else {
            $output = '<button class="prevButton" value="' . ($applicationFormPageNumber - 1) . '">Prev</button>';
        }
        if ($applicationFormPageNumber >= $finalPage) {
            $output .= '<button class="finishButton">Finish</button>';
        } else {
            $output .= '<button class="nextButton" type="submit" for="studentApplicationForm" value="' . ($applicationFormPageNumber + 1) . '">Next</button>';
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
