<?php

namespace Portal\Entities;

class CourseEntity
{
    protected $id;
    protected $startDate;
    protected $endDate;
    protected $name;
    protected $notes;
    protected $inPerson;
    protected $remote;
    protected $inPersonSpaces;
    protected $remoteSpaces;
    protected $totalAvailableSpaces;
    protected $spacesTaken;

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
    public function getNotes(): ?string
    {
        return $this->notes;
    }

    /**
     * @return string|null
     */
    public function getRemote()
    {
        return $this->remote;
    }

    /**
     * @return string|null
     */
    public function getInPerson()
    {
        return $this->inPerson;
    }

    /**
     * @return string|null
     */
    public function getTotalAvailableSpaces()
    {
        return $this->totalAvailableSpaces;
    }

    /**
     * @return string|null
     */
    public function getSpacesTaken()
    {
        return $this->spacesTaken;
    }
}
