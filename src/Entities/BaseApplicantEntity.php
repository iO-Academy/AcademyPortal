<?php


namespace Portal\Entities;

use Portal\Interfaces\BaseApplicantEntityInterface;

class BaseApplicantEntity implements BaseApplicantEntityInterface
{
    protected $id;
    protected $name;
    protected $email;
    protected $cohortDate;
    protected $dateTimeAdded;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Get's dateOfApplication.
     *
     * @return string, returns the dateOfApplication field.
     */
    public function getDateOfApplication()
    {
        return $this->dateTimeAdded;
    }

    /**
     * Get's cohortDate.
     *
     * @return string, returns the cohortDate field.
     */
    public function getCohortDate()
    {
        return date("F, Y", strtotime($this->cohortDate));
    }

}