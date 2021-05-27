<?php

namespace Portal\Validators;

use Portal\Sanitisers\StageSanitiser;

class StageValidator
{

    public static function validateStages(array $stages): array
    {
        foreach ($stages as $k => $stage) {
            if (self::validateExistingStage($stage)) {
                $stages[$k] = StageSanitiser::sanitise($stage);
            }
        }
        return $stages;
    }

    public static function validateNewStage(array $stage): bool
    {
        return (!empty($stage['title']) && is_bool($stage['student']));
    }

    public static function validateExistingStage(array $stage)
    {
        return (
            isset($stage['id']) &&
            is_numeric($stage['id']) &&
            !empty($stage['title']) &&
            !empty($stage['order']) &&
            is_bool($stage['student'])
        );
    }
}
