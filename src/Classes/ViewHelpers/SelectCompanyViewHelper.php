<?php


namespace Portal\ViewHelpers;

class SelectCompanyViewHelper
{
    public static function selectCompanyDropdown($data)
    {
        $SelectCompanyDropdown = '';
        foreach ($data['companySize'] as $companySize) {
            $SelectCompanyDropdown .= '<option value=' . $companySize['id'] . '>' . $companySize['size'] . '</option>';
        }
        return $SelectCompanyDropdown;
    }
}
