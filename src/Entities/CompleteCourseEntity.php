<?php

namespace Portal\Entities;

class CompleteCourseEntity extends CourseEntity
{
    protected ?int $inPersonSpaces;
    protected ?int $remoteSpaces;
    // defaulted null for testing purposes
    protected ?int $totalAvailableSpaces = null;
    protected ?int $spacesTaken = null;
    protected ?string $category = null;

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

    /**
     * @return string|null
     */
    public function getCategory(): ?string
    {
        return $this->category;
    }
}
