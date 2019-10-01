<?php

namespace Portal\Entities;

class EventEntity
{
    protected $id;
    protected $name;
    protected $category;
    protected $location;
    protected $date;
    protected $startTime;
    protected $endTime;
    protected $notes;

    public function __construct(
        int $eventId = null,
        string $name = null,
        int $category = null,
        string $location = null,
        Date $date = null,
        Time $startTime = null,
        Time $endTime = null,
        string $notes = null
    ) {
        $this->id = ($this->id ?? $eventId);
        $this->name = ($this->name ?? $name);
        $this->category = ($this->category ?? $category);
        $this->location = ($this->location ?? $location);
        $this->date = ($this->date ?? $date);
        $this->startTime = ($this->startTime ?? $startTime);
        $this->endTime = ($this->endTime ?? $endTime);
        $this->notes = ($this->notes ?? $notes);

        $this->sanitiseData();
    }

    /**
     * Will sanitise all the fields for an applicant.
     */
    private function sanitiseData()
    {
        $this->id = (int) $this->id;
        $this->name = $this->sanitiseString($this->name);
        $this->name = self::validateLength($this->name, 255);
        $this->category = (int)$this->category;
        $this->location = $this->sanitiseString($this->location);
        $this->location = self::validateLength($this->location, 255);
        $this->date = $this->sanitiseString($this->date);
        $this->startTime = $this->sanitiseString($this->startTime);
        $this->endTime = $this->sanitiseString($this->endTime);
        $this->notes = $this->sanitiseString($this->notes);
    }

    /**(
     * Sanitise as a string in the applicant table as data.
     *
     * @param string $eventData
     *
     * @return string, which will return the applicant data.
     */
    public function sanitiseString($eventData)
    {
        return filter_var($eventData, FILTER_SANITIZE_STRING);
    }

    /**
     * Validate that a string is not empty and is within length allowed, throws an error if not
     *
     * @param string $hiringPartnerData
     * @param int $characterLength
     * @throws \Exception if the array is empty
     *
     * @return string, which will return the hiring partner data or assigns to null
     */
    public static function validateLength(string $eventData, int $characterLength)
    {
        if ($eventData == '') {
            return null;
        } elseif (strlen($eventData) <= $characterLength) {
            return $eventData;
        } else {
            throw new \Exception('An input string does not exist or is too long');
        }
    }

    /**
     * Get event Id
     *
     * @return int
     */
    public function getId():int
    {
        return $this->id;
    }

    /**
     * Get event name
     *
     * @return string name
     */
    public function getName():string 
    {
        return $this->name;
    }

    /**
     * Get event category
     *
     * @return int category
     */
    public function getCategory():int 
    {
        return $this->category;
    }

    /**
     * Get event location
     *
     * @return string location
     */
    public function getLocation():string 
    {
        return $this->location;
    }

    /**
     * Get event date
     *
     * @return Date date
     */
    public function getDate():Date 
    {
        return $this->date;
    }

    /**
     * get event start time
     *
     * @return Time startTime
     */
    public function getStartTime():Time 
    {
        return $this->startTime;
    }

    /**
     * Get event end time
     *
     * @return Time endTime
     */
    public function getEndTime():Time 
    {
        return $this->endTime;
    }

    /**
     * Get event notes
     *
     * @return string notes
     */
    public function getNotes():string 
    {
        return $this->endTime;
    }
}