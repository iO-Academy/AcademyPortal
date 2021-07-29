<?php

namespace Portal\Entities;

use Portal\Interfaces\BaseApplicantEntityInterface;

class BaseApplicantEntity implements \JsonSerializable, BaseApplicantEntityInterface
{
    protected $id;
    protected $name;
    protected $email;
    protected $cohortDate;
    protected $dateTimeAdded;
    protected $stageID;
    protected $stageName;
    protected $stageOptionName;
    protected $chosenStartDate;
    protected $chosenCourseId;

    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'cohortDate' => $this->getCohortDate(),
            'dateTimeAdded' => $this->dateTimeAdded,
            'stageID' => $this->stageID,
            'stageName' => $this->stageName,
            'stageOptionName' => $this->stageOptionName,
            'chosenStartDate' => $this->chosenStartDate
        ];
    }

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
     * Get's dateOfApplication.
     *
     * @return string, returns the dateOfApplication field.
     */
    public function getDateOfApplicationForRFC3339()
    {
        return date('Y-m-d\TH:i', strtotime($this->dateTimeAdded));
    }

    /**
     * Get's dateOfApplication.
     *
     * @return string, returns the dateOfApplication field.
     */
    public function getPrettyDateOfApplication()
    {
        return date("d F, Y", strtotime($this->dateTimeAdded));
    }

    /**
     * Get's cohortDate.
     *
     * @return string, returns the cohortDate field.
     */
    public function getCohortDate()
    {
        $dates = array_map(function ($date) {
            return date("F, Y", strtotime($date['start_date']));
        }, $this->cohortDate);
        return implode('; ', $dates);
    }

    /**
     * @return mixed
     */
    public function getChosenStartDate()
    {
        if (!empty($this->chosenStartDate)) {
            return date("F, Y", strtotime($this->chosenStartDate));
        }
    }

    public function getCohortIds()
    {
        $dates = array_map(function ($date) {
            return $date['id'];
        }, $this->cohortDate);
        return implode(',', $dates);
    }

    public function setCohortDates(array $array)
    {
        $this->cohortDate = $array;
    }

    /**
     * @return mixed
     */
    public function getChosenCourseId()
    {
        return $this->chosenCourseId;
    }

    /**
     * @return mixed
     */
    public function getStageID()
    {
        return $this->stageID;
    }

    /**
     * @return mixed
     */
    public function getStageName()
    {
        return $this->stageName;
    }

    /**
     * @return mixed
     */
    public function getStageOptionName()
    {
        return $this->stageOptionName;
    }
}
