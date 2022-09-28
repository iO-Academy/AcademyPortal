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
            if ($trainer instanceof TrainerEntity) {
                $result .= '<tr><td>';
                $result .= '<a href="#" data-name="' . $trainer->getName() . '" data-notes="' . $trainer->getNotes();
                $result .= '" data-id="' . $trainer->getId() . '" type="button" class="myBtn';
                $result .= ($trainer->getDeleted() ? ' deleted' : '') . '">' . $trainer->getName() . '</a></td>';
                $result .= '<td class="email">' . $trainer->getEmail();
                $result .= '<button data-email="' . $trainer->getEmail() . '" class="clipboard">';
                $result .= '<i class="glyphicon glyphicon-copy"></i></button></td><td>';
                $result .= ($trainer->getDeleted() ? '' : '<button data-id="' . $trainer->getId()
                . '" class="btn btn-danger">Delete</button>');
                $result .= '</td></tr>';
            } else {
                $result .= '';
            }
        }
        return $result;
    }
}
