<?php

namespace Portal\ViewHelpers;

class CompanySizeViewHelper
{
    static public function companySizeDropdown($data) {
        var_dump($data);
        $companySizeDropdown = '';
        foreach ($data['companySize'] as $companySize) {
            $companySizeDropdown .= '<option value=' . $companySize['id'] . '>' . $companySize['size'] . '</option>';
        }
        return $companySizeDropdown;
    }
}