<?php

namespace Portal\ViewHelpers;

use Portal\Entities\TrainerEntity;

class TrainerCheckboxViewHelper
{
    /**
     * take list of trainers and foreach to display them as individual checkbox items
     */
    public static function displayTrainerCheckbox(array $trainers, array $courseTrainers = []): string
    {
        $result = "";
        $trainerIds = array_map(
            function ($a) {
                return  $a['trainer_id'];
            },
            $courseTrainers
        );
        foreach ($trainers as $trainer) {
            $checked = '';
            if ($trainer instanceof TrainerEntity) {
                $trainerId = $trainer->getId();
                if (in_array($trainerId, $trainerIds)) {
                    $checked = 'checked';
                }
                if (!$trainer->getDeleted()) {
                    $result .= '<input ' . $checked . ' type="checkbox" data-id="' . $trainerId
                        . '" name="trainer-checkbox">';
                    $result .= '<label class="trainerCheckboxLabel" for="">' . $trainer->getName() . '</label>';
                }
            }
        }
        return $result;
    }
}
