<?php

namespace Portal\Entities;

use Portal\Validators\StringValidator;

class StageEntity implements \JsonSerializable
{
    protected $id;
    protected $title;
    protected $order;
    protected $student;
    protected $deleted;
    protected $options;

    public function __construct($title = null, $order = null, $student = null)
    {
        $this->title = ($this->title ?? $title);
        $this->order = ($this->order ?? $order);
        $this->student = ($this->student ?? $student);
        $this->deleted = 0;

        $this->sanitiseData();
    }

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
     * Will sanitise all the fields for a stage.
     */
    private function sanitiseData()
    {
        $this->id = (int) $this->id;
        $this->title = StringValidator::sanitiseString($this->title);

        try {
            $this->title = StringValidator::validateLength($this->title, 255);
        } catch (\Exception $exception) {
            $this->title = substr($this->title, 0, 254);
        }

        $this->order = (int)$this->order;
        $this->student = (bool)$this->student;
        $this->deleted = (int)$this->deleted;
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
    public function getStageDeleted() : int
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
