<?php

namespace Portal\ViewHelpers;

class CompanySizeViewHelper
{
    static public function companySizeDropdown($companySizes) {
        $companySizeDropdown = '';
        foreach ($companySizes as $companySize) {
            $companySizeDropdown .= '<option value=' . $companySize['id'] . '>' . $companySize['company_size'] . '</option>';
        }
    }
}