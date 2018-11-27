<?php
/**
 * Created by PhpStorm.
 * User: academy
 * Date: 27/11/2018
 * Time: 10:10
 */

namespace Portal\Models;


class AddEventModel
{
    private $dbConnection;

    /**
     * AddEventModel constructor.
     */


    public function __construct(\PDO $dbConnection)
    {
        $this->dbConnection = $dbConnection;
    }

    public function insertNewEventToDb(array $newEventData)
    {
        $query = $this->dbConnection->prepare(
            'INSERT INTO `events` (`eventName`, `date`, `location`, `type`, `startTime`, `endTime`, `notes`) 
                        VALUES (:eventName, :date, :location, :type, :startTime, :endTime, :notes)');
        $query->bindParam(':eventName', $newEventData['eventName']);
        $query->bindParam(':data', $newEventData['data']);
        $query->bindParam(':location', $newEventData['location']);
        $query->bindParam(':type', $newEventData['type']);
        $query->bindParam(':startTime', $newEventData['startTime']);
        $query->bindParam(':endTime', $newEventData['endTime']);
        $query->bindParam(':notes', $newEventData['notes']);
        return $query->execute();

    }
    

}