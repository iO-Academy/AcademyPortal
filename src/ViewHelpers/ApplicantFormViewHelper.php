<?php

namespace Portal\ViewHelpers;

class ApplicantFormViewHelper
{
    public static function stagesDropdown($stages, $stageOptions)
    {
        $string = '';
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
                    $string .= '<option value="' . $option['id'] . '">' . $option['option'] . '</option>';
                }

                $string .= '</optgroup>';
            } else {
                $string .=
                    '<option class="stageDropdown" value="' . $stage['id'] . '">' . $stage['title'] . '</option>';
            }
        }
        return $string;
    }
}
