<?php

namespace Portal\Entities;

class EventEntity
{
    protected $id;
    protected $name;
    protected $date;
    protected $location;
    protected $start_time;
    protected $end_time;
    protected $notes;

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function getStartTime()
    {
        return $this->start_time;
    }

    public function getEndTime()
    {
        return $this->end_time;
    }

    public function getNotes(): ?string
    {
        return $this->notes;
    }



}