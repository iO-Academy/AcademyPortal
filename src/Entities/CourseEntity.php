<?php

namespace Portal\Entities;

class CourseEntity
{
    protected int $id;
    protected ?string $startDate;
    protected ?string $endDate;
    protected ?string $name;
    protected ?string $notes;
    protected ?bool $inPerson;
    protected ?bool $remote;
    protected ?int $inPersonSpaces;
    protected ?int $remoteSpaces;
    protected ?int $categoryId;
    /**
     * @return int
     */
    public function getId(): int
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
    public function getNotes(): ?string
    {
        return $this->notes;
    }

    /**
     * @return string|null
     */
    public function getRemote(): ?string
    {
        return $this->remote;
    }

    /**
     * @return string|null
     */
    public function getInPerson(): ?string
    {
        return $this->inPerson;
    }
}
