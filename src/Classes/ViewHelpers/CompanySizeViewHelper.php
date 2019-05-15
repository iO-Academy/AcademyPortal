<?php

namespace Portal\ViewHelpers;

class CompanySizeViewHelper
{
    static public function companySizeDropdown($data) {
        $companySizeDropdown = '';
        foreach ($data['companySize'] as $companySize) {
            $companySizeDropdown .= '<option value=' . $companySize['id'] . '>' . $companySize['size'] . '</option>';
        }
    }
}