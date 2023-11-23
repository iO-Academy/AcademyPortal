<?php

namespace Portal\ViewHelpers;

use Portal\Entities\TrainerEntity;

class TrainerCheckboxViewHelper
{
    /**
     * take list of trainers and foreach to display them as individual checkbox items
     */
    public static function displayTrainerCheckbox(array $trainers, array $selectedTrainerIds = null): string
    {
        $result = "";

        foreach ($trainers as $trainer) {
            if ($trainer instanceof TrainerEntity && !$trainer->getDeleted()) {
                $result .= '<input type="checkbox" data-id="' . $trainer->getId() . '" name="trainer-checkbox"';
                if (in_array($trainer->getId(), $selectedTrainerIds)) {
                    $result .= ' checked';
                }
                $result .= '><label class="trainerCheckboxLabel" for="">' . $trainer->getName() . '</label>';
            } else {
                $result .= '';
            }
        } return $result;
    }
}
