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
        $output = '<div class="row "><input type="text" placeholder="Full Name" class="form-control"></div>';
        $output .= '<div class="row"><input type="email" placeholder="Email" class="form-control"></div>';
        $output .= '<div class="row"><input type="tel" placeholder="Phone Number" class="form-control"></div>';
        // REPLACE WITH A DROPDOWN --> separate component for gender drop down options?
        $output .= '<div class="row"><label>Gender </label></div>';
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
        // REPLACE WITH A DROPDOWN --> fetch background from DB and add to populateDropdown
        $output = '<div class="row"><label>Background </label></div>';
        $output .= '<div class="row form-group"><div class="col-md-12"><label for="whyDev">Why do you want to become a developer?</label>';
        $output .= '<textarea id="whyDev" type="text" placeholder="(100 - 500 characters)" class="form-control" rows="5"></textarea>';
        $output .= '</div></div>';
        return $output;
    }

    /**
     * html to display the third question page
     *
     * @return string
     */
    protected static function displayPageFormThree(): string
    {
        $output = '<label for="pastCoding">Any past coding experience?</label>';
        $output .= '<input id="pastCoding" type="text" placeholder="Most people write a few sentences" class="form-control">';
        $output .= '';
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
        $output = '<label>Select start date(s)';
        //get cohorts from DB and for each
        $output .= '<input type="checkbox">';
        $output .= '<input type="checkbox" value="next available online course">';
        $output .= '<p>Some course dates may also be offered with a remote option. Contact us to find out more.</p>';
        $output .= '<label> How did you hear about us?';
        // REPLACE WITH A DROPDOWN - - > hear about us dropdown list.
        $output .= '<label> Course Report </label>';
        $output .= '<input type="radio" value="I am eligible to live and work in the UK"/>';
        $output .= '<input type="radio" value="I confirm that I am at least 18 years of age before my
 chosen course start date"/>';
        $output .= '<input type="radio" value="I am eligible to live and work in the UK"/>';
        $output .= '<p>By using this form you agree with the storage and handling of your data
 by this website in accordance with our terms and conditions and privacy policy.</p>';
        $output .= '<input type="radio" value="I accept the terms and conditions"/>';
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
    public static function displayPageByNumber(int $applicationFormPageNumber = 1, array $data = []): string
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

    public static function displayNextButtons(int $applicationFormPageNumber = 1, int $finalPage)
    {
        if($applicationFormPageNumber === 1){
            $output = '<div class="row"><div class="col-md-2 col-md-offset-8"><a class="btn btn-lg" href="/studentApplicationForm" disabled="disabled">Prev</a></div>';
        }else{
            $output = '<div class="row"><div class="col-md-2 col-md-offset-8"><a class="btn btn-lg" href="/studentApplicationForm/' .  ($applicationFormPageNumber - 1) .'">Prev</a></div>';
        }
        if($applicationFormPageNumber >= $finalPage){
            $output .= '<div class="col-md-2"><a class="btn btn-lg" href="/studentApplicationForm">Finish</a></div></div>';
        }else {
            $output .= '<div class="col-md-2"><a class="btn btn-lg" href="/studentApplicationForm/' . ($applicationFormPageNumber + 1) . '">Next</a></div></div>';
        }
        return $output;
    }
}
