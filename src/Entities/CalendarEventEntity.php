<?php

namespace Portal\Entities;

class CalendarEventEntity implements \JsonSerializable
{
    protected int $id;
    protected ?string $title;
    protected ?int $categoryId;
    protected ?string $categoryName;
    protected ?string $date;
    protected ?string $start;
    protected ?string $end;

    /**
     * Returns private properties from object.
     *
     * @return array
     */
    public function jsonSerialize(): array
    {
        return [
            'title' => $this->title,
            'categoryId' => $this->categoryId,
            'categoryName' => $this->categoryName,
            'start' => $this->start !== null ? $this->date . 'T' . $this->start : $this->date . 'T09:00:00',
            'end' => $this->start !== null ? $this->date . 'T' . $this->end : null,
            'allDay' => $this->start === null ? true : false
        ];
    }
}
