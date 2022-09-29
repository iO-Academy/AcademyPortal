<?php

namespace Portal\ViewHelpers;

use Portal\Entities\TrainerEntity;

class TrainerCheckboxViewHelper
{
    /**
     * take list of trainers and foreach to display them as individual checkbox items
     *
     * @param array $trainers
     * @return string
     */
    public static function displayTrainerCheckbox(array $trainers): string
    {
        $result = "";

        foreach ($trainers as $trainer) {
            if ($trainer instanceof TrainerEntity) {
                $result .= '<input type="checkbox" data-id="' . $trainer->getId() . '" name="trainer-checkbox"';
                $result .= '><label for="">' . $trainer->getName() . '</label>';
            } else {
                $result .= '';
            }
        } return $result;
    }
}
