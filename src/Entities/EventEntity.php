<?php

namespace Portal\Entities;

class EventEntity
{
    protected $event_id;
    protected $name;
    protected $category;
    protected $location;
    protected $date;
    protected $startTime;
    protected $endTime;
    protected $notes;
    protected $availableToHP;
    protected $eventCategories;

    /**
     * Get event id
     *
     * @return string id
     */
    public function getEventId(): int
    {
        return $this->event_id;
    }

    /**
     * Get event name
     *
     * @return string name
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Get event category
     *
     * @return int category
     */
    public function getCategory(): int
    {
        return $this->category;
    }

    /**
     * Get event location
     *
     * @return string location
     */
    public function getLocation(): string
    {
        return $this->location;
    }

    /**
     * Get event date
     *
     * @return string date
     */
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * get event start time
     *
     * @return string startTime
     */
    public function getStartTime(): string
    {
        return $this->startTime;
    }

    /**
     * Get event end time
     *
     * @return string endTime
     */
    public function getEndTime(): string
    {
        return $this->endTime;
    }

    /**
     * Get event notes
     *
     * @return string notes
     */
    public function getNotes(): string
    {
        if ($this->notes === null) {
            return '';
        } else {
            return $this->notes;
        }
    }

    /**
     * Get an int 0 or 1 which states whether hiring partners are involved or not
     *
     * @return int availableToHP
     */
    public function getAvailableToHP(): int
    {
        return $this->availableToHP;
    }
}
