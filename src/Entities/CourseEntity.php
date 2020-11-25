<?php


namespace Portal\Entities;


use phpDocumentor\Reflection\Types\This;

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