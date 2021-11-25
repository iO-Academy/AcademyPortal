<?php

namespace Portal\Sanitisers;

use Portal\Validators\StringValidator;

class StageSanitiser
{
    public static function sanitise(array $stage): array
    {
        $stage['id'] = (int)$stage['id'];
        $stage['title'] = StringSanitiser::sanitiseString($stage['title']);
        try {
            StringValidator::validateLength($stage['title'], StringValidator::MAXVARCHARLENGTH, 'title');
        } catch (\Exception $exception) {
            $stage['title'] = substr($stage['title'], 0, 254);
        }
        $stage['student'] = (int)$stage['student'];
        $stage['withdrawn'] = (int)$stage['withdrawn'];
        $stage['rejected'] = (int)$stage['rejected'];
        $stage['notAssigned'] = (int)$stage['notAssigned'];
        $stage['order'] = (int)$stage['order'];
        return $stage;
    }
}
