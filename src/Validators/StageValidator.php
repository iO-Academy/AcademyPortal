<?php

namespace Portal\Validators;

class StageValidator
{

    public static function sanitiseStageOrders(array $stages): array
    {
        foreach ($stages as $k => $stage) {
            if (self::validateStage($stage)) {
                $stages[$k]['id'] = (int)$stage['id'];
                $stages[$k]['title'] = StringValidator::sanitiseString($stage['title']);
                try {
                    $stages[$k]['title'] = StringValidator::validateLength($stage['title'], 255);
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
        return (isset($stage['id']) && is_numeric($stage['id']) && !empty($stage['title']) && !empty($stage['order']));
    }

}
