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
        string $date = null,
        string $startTime = null,
        string $endTime = null,
        string $notes = null
    ) {
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
     * Will sanitise all the fields for an event.
     */
    private function sanitiseData()
    {
        $this->name = $this->sanitiseString($this->name);
        $this->name = self::validateLength($this->name, 255);
        $this->category = (int)$this->category;
        $this->location = $this->sanitiseString($this->location);
        $this->location = self::validateLength($this->location, 255);
        $this->date = $this->sanitiseDate($this->date);
        $this->startTime = $this->sanitiseTime($this->startTime);
        $this->endTime = $this->sanitiseTime($this->endTime);
        $this->notes = $this->sanitiseString($this->notes);
        $this->notes = self::validateLength($this->notes, 255);
    }

    /**
     * Sanitise as a date in the event table as data.
     *
     * @param $date
     *
     * @return bool|string
     */
    public function sanitiseDate($date)
    {
        if (!preg_match('/([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))/', $date)) {
            return false;
        } else {
            return $this->sanitiseString($this->date);
        }
    }

    public function sanitiseTime($time)
    {
        if (
        !preg_match('/((1[0-2]|0?[1-9]):([0-5][0-9]))/', $time)
        )
        {
            return false;
        } else {
            if ($time == $this->startTime) {
                return $this->sanitiseString($this->startTime);
            } elseif ($time == $this->endTime) {
                return $this->sanitiseString($this->endTime);
            }
        }
    }

    /**(
     * Sanitise as a string in the event table as data.
     *
     * @param string $eventData
     *
     * @return string, which will return the event data.
     */
    public function sanitiseString($eventData)
    {
        return filter_var($eventData, FILTER_SANITIZE_STRING);
    }

    /**
     * Validate that a string exists and is within length allowed, throws an error if not
     *
     * @param string $eventData
     * @param int $characterLength
     * @return string, which will return the event data
     * @throws \Exception if the array is empty
     */
    public static function validateExistsAndLength(string $eventData, int $characterLength)
    {
        if (empty($eventData) == false && strlen($eventData) <= $characterLength) {
            return $eventData;
        } else {
            throw new \Exception('An input string does not exist or is too long');
        }
    }

    /**
     * Validate that a string is not empty and is within length allowed, throws an error if not
     *
     * @param string $eventData
     * @param int $characterLength
     * @return string, which will return the event data or assigns to null
     * @throws \Exception if the array is empty
     *
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
        return $this->notes;
    }
}
