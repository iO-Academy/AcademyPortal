<?php

namespace Portal\ViewHelpers;

class CompanySizeViewHelper
{
    public static function companySizeDropdown($data): string
    {
        $companySizeDropdown = '';
        if (!empty($data['companySize'])) {
            foreach ($data['companySize'] as $companySize) {
                $companySizeDropdown .=
                    '<option value="' . $companySize['id'] . '">' . $companySize['size'] . '</option>';
            }
        }
        return $companySizeDropdown;
    }
}
