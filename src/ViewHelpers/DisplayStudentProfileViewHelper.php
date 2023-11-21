<?php

namespace Portal\ViewHelpers;

use Portal\Controllers\API\LockApplicantFieldController;
use Portal\Entities\CompleteApplicantEntity;

class DisplayStudentProfileViewHelper
{
    public static function displayEditButtonOrQuestionMark(?bool $isLocked, string $fieldName)
    {
        return ($isLocked ?
            '<div><span 
            class="bi bi-question-circle"
            data-toggle="tooltip"
            data-placement="right" 
            title="This field has been locked by iO, please contact us if it is incorrect"
            ></div>' :
            '<button data-selector="' . $fieldName . '" 
                class="btn btn-primary btn-sm ' . $fieldName . 'EditButton editbutton" 
                id="' . $fieldName . 'EditButton">Edit</button>'
        );
    }

    public static function studentChecks(bool $check): string
    {
        return $check ? 'Yes' : 'No';
    }

    public static function laptopRequired(bool $required): string
    {
        return
            $required ? 'Yes' : 'No';
    }
}
