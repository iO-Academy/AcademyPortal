<?php

namespace Portal\ViewHelpers;

use DateTime;

class DisplayPastAssessmentDayViewHelper
{
    public static function displayPastAssessmentDays(?string $assessmentDay): string
    {
        $output = '';
        if ($assessmentDay !== null) {
            $assessmentDayObject = new DateTime($assessmentDay);
            $currentDateObject = new DateTime();

            if ($assessmentDayObject < $currentDateObject) {
                $output = "<p>Current saved date: " . $assessmentDayObject->format('d-m-Y') . "</p";
            }
        }
        return $output;
    }
}