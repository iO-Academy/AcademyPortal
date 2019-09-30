<?php

namespace Portal\Entities;

class EventEntity
{
    protected $name;
    protected $category;
    protected $date;
    protected $startTime;
    protected $endTime;
    protected $notes;

    public function __construct(
        string $name = null,
        int $category = null,
        Date $date = null,
        Time $startTime = null,
        Time $endTime = null,
        string $notes = null
    ) {
        $this->name = ($this->name ?? $name);
        $this->category = ($this->category ?? $category);
        $this->date = ($this->date ?? $date);
        $this->startTime = ($this->startTime ?? $startTime);
        $this->endTime = ($this->endTime ?? $endTime);
        $this->notes = ($this->notes ?? $notes);
    }
}
