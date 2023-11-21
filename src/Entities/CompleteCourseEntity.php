<?php

namespace Portal\Entities;

class CompleteCourseEntity extends CourseEntity
{
    protected ?int $inPersonSpaces;
    protected ?int $remoteSpaces;
    protected ?int $totalAvailableSpaces;
    protected ?int $spacesTaken;

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
