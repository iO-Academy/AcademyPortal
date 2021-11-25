<?php

namespace Portal\Entities;

class StageEntity implements \JsonSerializable
{
    protected $id;
    protected $title;
    protected $order;
    protected $student;
    protected $deleted;
    protected $options;
    protected $hasAssignees;
    protected $withdrawn;
    protected $rejected;
    protected $notAssigned;

    /**
     * Returns private properties from object.
     *
     * @return array|mixed
     */
    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'order' => $this->order,
            'student' => $this->student,
            'withdrawn' => $this->withdrawn,
            'rejected' => $this->rejected,
            'notAssigned' => $this->notAssigned
        ];
    }

    /**
     *  Get stage id
     *
     * @return mixed
     */
    public function getStageId()
    {
        return $this->id;
    }

    /**
     * Get's stage title.
     *
     * @return string, returns the stage title field.
     */
    public function getStageTitle(): string
    {
        return $this->title;
    }

    /**
     * Get's stage order.
     *
     * @return int, returns the stage order field.
     */
    public function getStageOrder(): int
    {
        return $this->order;
    }

    /**
     * Get stage deleted
     *
     * @return string
     */
    public function getStageDeleted(): int
    {
        return $this->deleted;
    }

    /**
     * Sets options
     *
     * @param array $options array of desired options
     * @return void
     */
    public function setOptions(array $options)
    {
        $this->options = $options;
    }

    /**
     * Gets options
     *
     * @return array|null the options
     */
    public function getOptions(): ?array
    {
        return $this->options;
    }

    /**
     * @return bool|null
     */
    public function getStudent(): ?bool
    {
        return $this->student;
    }

    /**
     * Returns number of assignees to stage
     *
     * @return int
     */
    public function getHasAssignees(): int
    {
        return $this->hasAssignees;
    }

     /** Gets stage withdrawn
     *
     * @return bool|null
     */
    public function getWithdrawn(): ?bool
    {
        return $this->withdrawn;
    }

    /**
     * Gets stage rejected
     *
     * @return bool|null
     */
    public function getRejected(): ?bool
    {
        return $this->rejected;
    }

    /**
     * Gets stage not assigned
     *
     * @return bool|null
     */
    public function getNotAssigned(): ?bool
    {
        return $this->notAssigned;
    }
}
