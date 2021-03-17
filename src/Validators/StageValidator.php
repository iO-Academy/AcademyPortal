<?php

namespace Portal\Validators;

use Portal\Sanitisers\StringSanitiser;

class StageValidator
{

    public static function sanitiseStageOrders(array $stages): array
    {
        foreach ($stages as $k => $stage) {
            if (self::validateStage($stage)) {
                $stages[$k]['id'] = (int)$stage['id'];
                $stages[$k]['student'] = $stage['student'];
                $stages[$k]['title'] = StringSanitiser::sanitiseString($stage['title']);
                try {
                    StringValidator::validateLength($stage['title'], StringValidator::MAXVARCHARLENGTH, 'title');
                } catch (\Exception $exception) {
                    $stages[$k]['title'] = substr($stage['title'], 0, 254);
                }

                $stages[$k]['order'] = (int)$stage['order'];
            }
        }
        return $stages;
    }

    private static function validateStage(array $stage)
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
