<?php

namespace Portal\Entities;

class StageEntity extends ValidationEntity implements \JsonSerializable
{
    protected $id;
    protected $title;
    protected $order;

    public function __construct(string $title = null, string $order = null)
    {
        $this->id = null;
        $this->title = ($this->title ?? $title);
        $this->order = ($this->order ?? $order);
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
            'order' => $this->order
        ];
    }

    /**
     * Will sanitise all the fields for a stage.
     */
    private function sanitiseData()
    {
        $this->id = (int) $this->id;
        $this->title = self::sanitiseString($this->title);
        $this->order = (int) $this->order;
    }

    /**
     * Get's stage Id.
     *
     * @return int, returns the stage Id field.
     */
    public function getStageId(): int
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
}
