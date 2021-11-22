<?php

namespace Portal\ViewHelpers;

class StudentApplicationFormViewHelper
{
    protected static function displayPageFormOne(array $data): string {
        $output = '<input type="text" placeholder="Full Name">';
        $output .= '<input type="email" placeholder="Email">';
        $output .= '<input type="tel" placeholder="Phone Number">';
        $output .= '<label>Gender </label>'; // REPLACE WITH A DROPDOWN --> separate component for gender drop down options?
        return $output;
    }

    protected static function displayPageFormTwo(array $data): string {
        $output = '<label>Background </label>'; // REPLACE WITH A DROPDOWN --> fetch background from DB and add to populateDropdown
        $output .= '<label>Why do you want to become a developer?';
        $output .= '<input type="text" placeholder="(100 - 500 characters)">';
        $output .= '</label>';
        return $output;
    }

    protected static function displayPageFormThree(): string {
        $output = '<label>Any past coding experience?';
        $output .= '<input type="text" placeholder="Most people write a few sentences">';
        $output .= '</label>';
        return $output;
    }

    protected static function displayPageFormFour(array $data): string {
        $output = '<label>Select start date(s)';
        $output .= '<input type="checkbox">'; //get cohorts from DB and for each
        $output .= '<input type="checkbox" value="next available online course">';
        $output .= '<p>Some course dates may also be offered with a remote option. Contact us to find out more.</p>';
        $output .= '<label> How did you hear about us?';
        $output .= '<label> Course Report </label>'; // REPLACE WITH A DROPDOWN - - > hear about us dropdown list.
        $output .= '<input type="radio" value="I am eligible to live and work in the UK"/>';
        $output .= '<input type="radio" value="I confirm that I am at least 18 years of age before my chosen course start date"/>';
        $output .= '<input type="radio" value="I am eligible to live and work in the UK"/>';
        $output .= '<p>By using this form you agree with the storage and handling of your data
 by this website in accordance with our terms and conditions and privacy policy.</p>';
        $output .= '<input type="radio" value="I accept the terms and conditions"/>';
        return $output;
    }

    protected static function displayPageFormFive(): string {
        $output = '<h2>Ready to submit?</h2>';
        $output .= '<p>Next Steps</p>';
        $output .= '<ul>';
        $output .= '<li>We’ll read through your application and be in touch within the next few days.</li>';
        $output .= '<li>We will send you our problem-solving test via email. You’ll have ten days to complete this. (Don’t worry, no coding knowledge needed!)</li>';
        $output .= '<li>We will also arrange an informal chat between you and one of our trainers.</li>';
        $output .= '<li>After your chat with a trainer, we will be in touch within five working days to let you know whether your application has been successful and talk next steps!</li>';
        $output .= '</ul>';
        return $output;
    }

    public static function displayPageByNumber(int $applicationFormPageNumber = 1, array $data = []): string {
        switch ($applicationFormPageNumber){
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
}