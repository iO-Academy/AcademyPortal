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

        $this->sanitiseData();
    }

    /**
     * Returns private properties from object.
     *
     * @return array|mixed
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
     * Will sanitise the options for a stage.
     */
    private function sanitiseData()
    {
        $this->id = (int) $this->id;
        $this->option = StringValidator::sanitiseString($this->option);

        try {
            $this->option = StringValidator::validateLength($this->option, 255);
        } catch (\Exception $exception) {
            $this->option = substr($this->option, 0, 254);
        }
        
        $this->stageId = (int) $this->stageId;
        $this->deleted = (int) $this->deleted;
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
    public function getOptionDeleted() : int
    {
        return $this->deleted;
    }
}
