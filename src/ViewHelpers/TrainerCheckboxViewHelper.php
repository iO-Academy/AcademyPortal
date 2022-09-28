<?php

namespace Portal\ViewHelpers;

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
            $result .= '<div><input type="checkbox" data-id="' . $trainer->getId() . '" name="trainer-checkbox"';
            $result .= ' checked><label for="">' . $trainer->getName() . '</label></div>';
        } return $result;
    }
}
