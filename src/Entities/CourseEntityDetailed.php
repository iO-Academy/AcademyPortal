<?php

namespace Portal\Entities;

class CourseEntityDetailed extends CourseEntity
{
    protected ?int $inPersonSpaces;
    protected ?int $remoteSpaces;
    protected ?int $totalAvailableSpaces;
    protected ?int $spacesTaken;

    /**
     * @return string|null
     */
    public function getTotalAvailableSpaces(): ?string
    {
        return $this->totalAvailableSpaces;
    }

    /**
     * @return string|null
     */
    public function getSpacesTaken(): ?string
    {
        return $this->spacesTaken;
    }
}
