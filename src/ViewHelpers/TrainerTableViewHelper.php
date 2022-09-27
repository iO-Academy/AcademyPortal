<?php

namespace Portal\ViewHelpers;

class TrainerTableViewHelper
{
    public static function displayTrainerTable(array $trainers): string
    {
        $result = '';
        foreach ($trainers as $trainer) {
            if ($trainer['deleted'] === 0) {
                $result .= '<tr>';
                $result .= '<td>' . $trainer['name'] . '</td>';
                $result .= '<td>' . $trainer['email'] . '</td>';
                $result .= '<td>' . $trainer['notes'] . '</td>';
                $result .= '<td><button class=\'btn btn-danger\'>Delete</button></td>';
            }
        }
        return $result;
    }
}
