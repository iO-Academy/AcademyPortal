<?php

namespace Portal\Entities;

class CalendarCourseEntity implements \JsonSerializable
{
    protected int $id;
    public ?string $categoryName;
    public ?string $startDate;
    public ?string $endDate;
    public ?string $title;

    /**
     * Returns properties from object.
     *
     * @return array
     */

    public function jsonSerialize(): array
    {
        return [
            'title' => $this->title,
            'id' => $this->id,
            'categoryName' => $this->categoryName,
            'start' => $this->startDate,
            'end' => $this->endDate,
            'allDay' => true,
        ];
    }
}
