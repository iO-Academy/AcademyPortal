<?php

namespace Portal\Entities;

use Portal\Validators\StringValidator;

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
    protected $eventCategories;

    public function __construct(
        string $event_id = null,
        string $name = null,
        int $category = null,
        string $location = null,
        string $date = null,
        string $startTime = null,
        string $endTime = null,
        string $notes = null,
        array $eventCategories // @todo: wtf?!
    ) {
        $this->event_id = ($this->event_id ?? $event_id);
        $this->name = ($this->name ?? $name);
        $this->category = ($this->category ?? $category);
        $this->location = ($this->location ?? $location);
        $this->date = ($this->date ?? $date);
        $this->startTime = ($this->startTime ?? $startTime);
        $this->endTime = ($this->endTime ?? $endTime);
        $this->notes = ($this->notes ?? $notes);
        $this->eventCategories = $eventCategories;

        $this->sanitiseData();
    }

    /**
     * Will sanitise all the fields for an event.
     */
    private function sanitiseData()
    {
        $this->event_id = (int)$this->event_id;
        $this->name = StringValidator::sanitiseString($this->name);
        $this->name = StringValidator::validateExistsAndLength($this->name, 255);
        $this->category = (int)$this->category;
        $this->category = self::validateCategoryExists($this->category, $this->eventCategories);
        $this->location = StringValidator::sanitiseString($this->location);
        $this->location = StringValidator::validateExistsAndLength($this->location, 255);
        $this->date = $this->validateDate($this->date);
        $this->startTime = $this->validateTime($this->startTime);
        $this->endTime = $this->validateTime($this->endTime);
        $this->validateStartEndTime($this->startTime, $this->endTime);
        if ($this->notes !== null) {
            $this->notes = StringValidator::sanitiseString($this->notes);
            $this->notes = StringValidator::validateLength($this->notes, 5000);
        }
    }

    /**
     * Sanitise as a date in the event table as data.
     *
     * @param string $date
     *
     * @return bool|string
     */
    public static function validateDate(string $date) // @todo: move to validator
    {
        if (!preg_match('/([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))/', $date)) {
            throw new \Exception('Please enter correct date');
        } else {
            return $date;
        }
    }

    /**
     * Sanitise as a time in the event table as data.
     *
     * @param string $time
     * @return bool|string
     */
    public static function validateTime(string $time) // @todo: move to validator
    {
        if (!preg_match('/([01][0-9]|2[0-3]):[0-5][0-9]/', $time)
        ) {
            throw new \Exception('Please enter correct time');
        } else {
            return $time;
        }
    }

    /**
     * Validate that end time is later than start time
     *
     * @param $startTime
     * @param $endTime
     * @return bool
     * @throws \Exception
     */
    public static function validateStartEndTime($startTime, $endTime) // @todo: move to validator
    {
        if ($startTime >= $endTime) {
            throw new \Exception('End time should be later than start time');
        } else {
            return true;
        }
    }

    /**
     * Make sure that the category exists
     *
     * @param int $category
     * @param array $categoryList
     */
    public static function validateCategoryExists(int $category, array $categoryList) // @todo: move to validator
    {
        $zeroIndexCat = intval($category) - 1;
        if (array_key_exists($zeroIndexCat, $categoryList)) {
            return $category;
        } else {
            throw new \Exception('Category is not valid.');
        }
    }

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
}
