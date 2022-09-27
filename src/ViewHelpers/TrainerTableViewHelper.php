<?php

namespace Portal\ViewHelpers;

use Portal\Entities\TrainerEntity;

class TrainerTableViewHelper
{

    /**
     * Displays all trainer that have not been deleted in a table
     *
     * @param array of TrainerEntity
     * @return string
     */
    public static function displayTrainerTable(array $trainers): string
    {
        $result = '';
        foreach ($trainers as $trainer) {
            if ($trainer instanceof TrainerEntity && $trainer->getDeleted() === 0) {
                $result .= '<tr>';
                $result .= '<td><a href=\'#\' data-id=\'' . $trainer->getId();
                $result .= '\' type=\'button\' class=\'myBtn\'>' . $trainer->getName() . '</td>';
                $result .= '<td>' . $trainer->getEmail() . '<button class="clipboard">';
                $result .= '<i class="glyphicon glyphicon-copy"></i></button></td>';
                $result .= '<td><button class=\'btn btn-danger\'>Delete</button></td>';
            } else {
                $result = '';
            }
        }
        return $result;
    }
}
