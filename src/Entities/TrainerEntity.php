<?php

namespace Portal\Entities;

class TrainerEntity
{
    protected $id;
    protected $name;
    protected $email;
    protected $notes;
    protected $deleted;

    /**
     * Get the value of id
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Get the value of name
     * @return string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Get the value of email
     * @return string
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * Get the value of notes
     * @return string
     */
    public function getNotes(): ?string
    {
        return $this->notes;
    }

    /**
     * Get the value of deleted
     * @return int
     */
    public function getDeleted(): ?int
    {
        return $this->deleted;
    }
}
