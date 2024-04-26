<?php

namespace Portal\ViewHelpers;

use Portal\Entities\TrainerEntity;

class TrainerCheckboxViewHelper
{
    /**
     * take list of trainers and foreach to display them as individual checkbox items
     */
    public static function displayTrainerCheckbox(array $trainers, $courseTrainers): string
    {
        $result = "";

        foreach ($trainers as $trainer) {
            $checked = '';
            $trainerIds = array_map(function ($a) {return  $a['trainer_id'];},$courseTrainers);
            if (in_array($trainer->getId(), $trainerIds)) {
                $checked = 'checked';
            }
            if ($trainer instanceof TrainerEntity && !$trainer->getDeleted()) {
                $result .= '<input ' . $checked . ' type="checkbox" data-id="' . $trainer->getId() . '" name="trainer-checkbox">';
                $result .= '<label class="trainerCheckboxLabel" for="">' . $trainer->getName() . '</label>';
            }
        }
        return $result;
    }
}
