<?php

namespace Portal\Entities;

use Portal\Validators\StringValidator;

class OptionsEntity implements \JsonSerializable
{
    protected $id;
    protected $option;
    protected $stageId;
    protected $deleted;
    
    public function __construct($option = null, $stageId = null)
    {
        $this->option = ($this->option ?? $option);
        $this->stageId = ($this->stageId ?? $stageId);
        $this->deleted = 0;
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
            'option' => $this->option,
            'stageId' => $this->stageId
        ];
    }

    /**
     *  Get stage id
     *
     * @return mixed
     */
    public function getOptionId()
    {
        return $this->id;
    }

    /**
     * Get's stage title.
     *
     * @return string, returns the stage title field.
     */
    public function getOptionTitle(): string
    {
        return $this->option;
    }

    /**
     * Get's stage order.
     *
     * @return int, returns the stage order field.
     */
    public function getStageId(): int
    {
        return $this->stageId;
    }

    /**
     * Get stage deleted
     *
     * @return string
     */
    public function getOptionDeleted() : int
    {
        return $this->deleted;
    }
}
