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
            'student' => $this->student
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
}
