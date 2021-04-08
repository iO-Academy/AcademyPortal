<?php

namespace Portal\ViewHelpers;

class ApplicantFormViewHelper
{
    public static function stagesDropdown($stages, $stageOptions, $currentStage)
    {
        $string = '';

        /* Tech debt - to be tidied up */
        foreach ($stages as $stage) {
            $stageHasOptions = false;
            $optionsForThisStage = [];
            foreach ($stageOptions as $stageOption) {
                if ($stageOption['stageId'] == $stage['id']) {
                    $stageHasOptions = true;
                    $optionsForThisStage[] = $stageOption;
                }
            }
            if ($stageHasOptions) {
                $string .= '<optgroup label="' . $stage['title'] . '">';

                foreach ($optionsForThisStage as $option) {
                    $string .= '<option name="stageId" value="' . $stage['id'] . " " . $option['id'] . '"';

                    if ($currentStage === $option['option']) {
                        $string .= 'selected="selected">' . $option['option'] . '</option>';
                    } else {
                        $string .= ">" . $option['option']  . '</option>';
                    }
                }
                $string .= '</optgroup>';
            } else {
                $string .= '<option class="stageDropdown" name="stageId" value="' . $stage['id'] . '"';
                if ($currentStage === $stage['title']) {
                    $string .= ' selected="selected">' . $stage['title'] . '</option>';
                } else {
                    $string .= '>' . $stage['title'] . '</option>';
                }
            }
        }
        return $string;
    }
}
