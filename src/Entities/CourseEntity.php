<?php

namespace Portal\Entities;

use Portal\Validators\DateTimeValidator;
use Portal\Validators\StringValidator;

class CourseEntity
{
    protected $startDate;
    protected $endDate;
    protected $name;
    protected $trainer;
    protected $notes;
    protected $id;

    public function __construct(
        string $startDate = null,
        string $endDate = null,
        string $name = null,
        string $trainer = null,
        string $notes = null,
        int $id = null
    ) {
        $this->startDate = ($this->startDate ?? $startDate);
        $this->endDate = ($this->endDate ?? $endDate);
        $this->name = ($this->name ?? $name);
        $this->trainer = ($this->trainer ?? $trainer);
        $this->notes = ($this->notes ?? $notes);
        $this->id = ($this->id ?? $id);

        $this->sanitiseData();
    }

    /**
     * To validate course start/end dates.
     */
    private function sanitiseData()
    {
        $this->startDate= DateTimeValidator::validateDate($this->startDate);
        $this->endDate = DateTimeValidator::validateDate($this->endDate);
        DateTimeValidator::validateStartEndTime($this->getStartDate(), $this->getEndDate());
        $this->name = StringValidator::sanitiseString($this->name);
        $this->trainer = StringValidator::sanitiseString($this->trainer);
        $this->notes = StringValidator::sanitiseString($this->notes);
        $this->id = (int) $this->id;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getStartDate(): ?string
    {
        return $this->startDate;
    }

    /**
     * @return string|null
     */
    public function getEndDate(): ?string
    {
        return $this->endDate;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return string|null
     */
    public function getTrainer(): ?string
    {
        return $this->trainer;
    }

    /**
     * @return string|null
     */
    public function getNotes(): ?string
    {
        return $this->notes;
    }
}
