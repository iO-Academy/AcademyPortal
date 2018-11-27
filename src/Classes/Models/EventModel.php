<?php
/**
 * Created by PhpStorm.
 * User: academy
 * Date: 27/11/2018
 * Time: 10:10
 */

namespace Portal\Models;


class EventModel
{

    private $dbConnection;


    /**
     * EventModel constructor.
     *
     * @param \PDO $dbConnection
     */
    public function __construct(\PDO $dbConnection)
    {
        $this->dbConnection = $dbConnection;
    }

    /**
     * Inserts new event into the database using data from the given array.
     *
     * @param array $newEventData
     *
     * @return bool true if database query successful and false if otherwise.
     */
    public function insertNewEventToDb(array $newEventData)
    {
        $query = $this->dbConnection->prepare(
            'INSERT INTO `events` (`eventName`, `date`, `location`, `type`, `startTime`, `endTime`, `notes`) 
                        VALUES (:eventName, :date, :location, :type, :startTime, :endTime, :notes)');
        $query->bindParam(':eventName', $newEventData['eventName']);
        $query->bindParam(':date', $newEventData['date']);
        $query->bindParam(':postCode', $newEventData['postCode']);
        $query->bindParam(':type', $newEventData['type']);
        $query->bindParam(':startTime', $newEventData['startTime']);
        $query->bindParam(':endTime', $newEventData['endTime']);
        $query->bindParam(':notes', $newEventData['notes']);
        return $query->execute();

    }
    

}