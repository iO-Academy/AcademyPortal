<?php

namespace Portal\ViewHelpers;

class TrainerCheckboxViewHelper
{
    public static function displayTrainerCheckbox(array $trainers)
    {
        $result = "";

        foreach ($trainers as $trainer) {
            $result .= '<div><input type="checkbox" data-id="' . $trainer->getId() . '" name="trainer-checkbox"';
            $result .= ' checked><label for="">' . $trainer->getName() . '</label></div>';
        }
    }
}
