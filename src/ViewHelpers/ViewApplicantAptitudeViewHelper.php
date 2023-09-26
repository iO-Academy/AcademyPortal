<?php

namespace Portal\ViewHelpers;

class ViewApplicantAptitudeViewHelper
{
    public static function DisplayEmail(array $emails): string
    {
        $output = '';
        foreach ($emails as $email) {
            $output .= '<li>' . $email->getUserEmail() . '</li>';
        }
        return $output;
    }
}