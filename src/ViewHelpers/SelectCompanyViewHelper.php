<?php

namespace Portal\ViewHelpers;

class SelectCompanyViewHelper
{
    public static function selectCompanyDropdown($data)
    {
        $SelectCompanyDropdown = '';
        foreach ($data['companyName'] as $companyName) {
            $SelectCompanyDropdown .= '<option value=' . $companyName['id'] . '>' . $companyName['name'] . '</option>';
        }
        return $SelectCompanyDropdown;
    }
}
