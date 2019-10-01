<?php

namespace Portal\Entities;

class EventEntity
{
    protected $name;
    protected $category;
    protected $location;
    protected $date;
    protected $startTime;
    protected $endTime;
    protected $notes;

    public function __construct(
        string $name = null,
        int $category = null,
        string $location = null,
        Date $date = null,
        Time $startTime = null,
        Time $endTime = null,
        string $notes = null
    ) {
        $this->name = ($this->name ?? $name);
        $this->category = ($this->category ?? $category);
        $this->location = ($this->location ?? $location);
        $this->date = ($this->date ?? $date);
        $this->startTime = ($this->startTime ?? $startTime);
        $this->endTime = ($this->endTime ?? $endTime);
        $this->notes = ($this->notes ?? $notes);
    }

    /**
     * Will sanitise all the fields for an applicant.
     */
    private function sanitiseData()
    {
        $this->name = $this->sanitiseString($this->name);
        $this->category = $this->sanitiseString($this->category);
        $this->location = $this->sanitiseString($this->location);
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
