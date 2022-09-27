<?php

namespace Portal\Validators;

class TrainerValidator
{
    public static function validate(array $trainer): bool
    {
        StringValidator::validateExistsAndLength($trainer['name'], 255, 'Name');
        StringValidator::validateExistsAndLength($trainer['email'], 255, 'Email');
        StringValidator::validateLength($trainer['notes'], 5000, 'Notes');
        return true;
    }
}
