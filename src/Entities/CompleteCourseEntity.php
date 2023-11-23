<?php

namespace Portal\Entities;

class CompleteCourseEntity extends CourseEntity
{
    protected ?int $inPersonSpaces;
    protected ?int $remoteSpaces;
    // defaulted null for testing purposes
    protected ?int $totalAvailableSpaces = null;
    protected ?int $spacesTaken = null;
    protected ?int $deleted;

    /**
     * @return string
     */
    public function getTotalAvailableSpaces(): string
    {
        return $this->totalAvailableSpaces === null ? 'N/A' : $this->totalAvailableSpaces;
    }

    /**
     * @return string
     */
    public function getSpacesTaken(): string
    {
        return $this->spacesTaken === null ? 'N/A' : $this->spacesTaken;
    }
}
