<?php

namespace Portal\Entities;

class OptionsEntity implements \JsonSerializable
{
    protected $id;
    protected $option;
    protected $stageId;
    protected $deleted;

    /**
     * Returns private properties from object.
     *
     * @return array
     */
    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'option' => $this->option,
            'stageId' => $this->stageId
        ];
    }

    /**
     *  Get option id
     *
     * @return int
     */
    public function getOptionId(): int
    {
        return $this->id;
    }

    /**
     * Gets option title.
     *
     * @return string, returns the option title field.
     */
    public function getOptionTitle(): string
    {
        return $this->option;
    }

    /**
     * Gets stage Id.
     *
     * @return int, returns the stage Id field.
     */
    public function getStageId(): int
    {
        return $this->stageId;
    }

    /**
     * Gets option deleted
     *
     * @return int
     */
    public function getOptionDeleted(): int
    {
        return $this->deleted;
    }
}
