<?php


namespace Portal\ViewHelpers;

class selectCompanyViewHelper
{
    public static function selectCompanyDropdown($data)
    {
        $companySizeDropdown = '';
        foreach ($data['companySize'] as $companySize) {
            $companySizeDropdown .= '<option value=' . $companySize['id'] . '>' . $companySize['size'] . '</option>';
        }
        return $companySizeDropdown;
    }
}
