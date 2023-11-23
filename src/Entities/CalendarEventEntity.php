<?php

namespace Portal\Entities;

class CalendarEventEntity implements \JsonSerializable
{
    protected int $id;
    protected ?string $title;
    protected ?int $categoryId;
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
            'start' => $this->date . 'T' . $this->start,
            'end' => $this->date . 'T' . $this->end
        ];
    }
}
