<?php

namespace Portal\Validators;

use mysql_xdevapi\Exception;

class ReportValidator
{
    public static function validate(array $args): bool
    {
        if ($args['cat'] == '' || $args['start'] == '' || $args['end'] == '') {
            throw new Exception('Please complete all input fields.');
        } else {
            return true;
        }
    }
}