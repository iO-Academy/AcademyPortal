<?php

namespace Portal\ViewHelpers;

class StudentApplicationFormViewHelper
{
    protected int $applicationFormPageNumber = 1;

    /** Fetches the current application form page number
     * @return int
     */
    public function getApplicationFormPageNumber(): int
    {
        return $this->applicationFormPageNumber;
    }

    /** Updates the current application form page number
     * @param int $applicationFormPageNumber
     */
    public function setApplicationFormPageNumber(int $newPageNumber): void
    {
        $this->applicationFormPageNumber = $newPageNumber;
    }

    public static function displayPageFormOne(): string {
        $output = '<input type="text" placeholder="Full Name">';
        $output .= '<input type="email" placeholder="Email">';
        $output .= '<input type="tel" placeholder="Phone Number">';
        $output .= '<label>Gender </label>'; // REPLACE WITH A DROPDOWN --> separate component for gender drop down options?
        return $output;
    }

    public static function displayPageFormTwo(): string {
        $output .= '<label>Background </label>'; // REPLACE WITH A DROPDOWN --> fetch background from DB and add to populateDropdown
        $output .= '<label>Why do you want to become a developer?';
        $output .= '<input type="text" placeholder="(100 - 500 characters)">';
        $output .= '</label>';
        return $output;
    }

    public static function displayPageFormThree(): string {
        $output .= '<label>Any past coding experience?';
        $output .= '<input type="text" placeholder="Most people write a few sentences">';
        $output .= '</label>';
        return $output;
    }

    public static function displayPageFormFour(): string {
        $output .= '<label>';
        $output = '<input type="checkbox">';
        return $output;
    }

    public static function displayPageFormFive(): string {
        $output = '';
        return $output;
    }

    public function displayPageByNumber(): string {
        switch ($this->applicationFormPageNumber){
            case 2:
                $this::displayPageFormTwo();
                break;
            case 3:
                $this::displayPageFormThree();
                break;
            case 4:
                $this::displayPageFormFour();
                break;
            case 5:
                $this::displayPageFormFive();
                break;
            default:
                $this::displayPageFormOne();
        }
    }
}