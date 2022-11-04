<?php

namespace Portal\ViewHelpers;

class SelectCompanyViewHelper
{
    public static function selectCompanyDropdown(array $data): string
    {
        $SelectCompanyDropdown = '';
        foreach ($data['companyName'] as $companyName) {
            $SelectCompanyDropdown .= '<option value=' . $companyName['id'] . '>' . $companyName['name'] . '</option>';
        }
        return $SelectCompanyDropdown;
    }
}
