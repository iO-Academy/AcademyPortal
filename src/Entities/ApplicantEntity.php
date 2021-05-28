<?php

namespace Portal\Entities;

use Portal\Interfaces\ApplicantEntityInterface;

class ApplicantEntity extends BaseApplicantEntity implements \JsonSerializable, ApplicantEntityInterface
{
    protected $phoneNumber;
    protected $cohortId;
    protected $whyDev;
    protected $codeExperience;
    protected $hearAboutId;
    protected $eligible;
    protected $eighteenPlus;
    protected $finance;
    protected $notes;
    protected $stageID;
    protected $backgroundInfoId;
    protected $backgroundInfo;

    /**
     * @return mixed
     */
    public function getBackgroundInfo()
    {
        return $this->backgroundInfo;
    }


    /**
     * Returns private properties from object.
     *
     * @return array
     */
    public function jsonSerialize()
    {
        return [
                  'id' => $this->id,
                  'name' => $this->name,
                  'email' => $this->email,
                  'phoneNumber' => $this->phoneNumber,
                  'cohortID' => $this->cohortId,
                  'whyDev' => $this->whyDev,
                  'codeExperience' => $this->codeExperience,
                  'hearAboutId' => $this->hearAboutId,
                  'eligible' => $this->eligible,
                  'eighteenPlus' => $this->eighteenPlus,
                  'finance' => $this->finance,
                  'notes' => $this->notes,
                  'cohortDate' => $this->getCohortDate(),
                  'dateTimeAdded' => $this->dateTimeAdded,
                  'backgroundInfoId' => $this->backgroundInfoId,
                  'backgroundInfo' => $this->backgroundInfo
               ];
    }

    /**
     * @return mixed
     */
    public function getStageID()
    {
        return $this->stageID;
    }

    /**
     * Get's phoneNumber.
     *
     * @return string, returns the phoneNumber field.
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * Get's cohortId.
     *
     * @return string, returns the cohortId field.
     */
    public function getCohortId()
    {
        return $this->cohortId;
    }

    /**
     * Get's whyDev.
     *
     * @return string, returns the whyDev field.
     */
    public function getWhyDev()
    {
        return $this->whyDev;
    }

    /**
     * Get's codeExperience.
     *
     * @return string, returns the experience field.
     */
    public function getCodeExperience()
    {
        return $this->codeExperience;
    }

    /**
     * Get's hearAboutID.
     *
     * @return string, returns the hearAboutID field.
     */
    public function getHearAboutId()
    {
        return $this->hearAboutId;
    }

    /**
     * Get's eligible.
     *
     * @return string, returns the eligible field.
     */
    public function getEligible()
    {
        return $this->eligible;
    }

    /**
     * Get's eighteenPlus.
     *
     * @return string, returns the eighteenPlus field.
     */
    public function getEighteenPlus()
    {
        return $this->eighteenPlus;
    }

    /**
     * Get's finance.
     *
     * @return string, returns the finance field.
     */
    public function getFinance()
    {
        return $this->finance;
    }

    /**
     * Get's notes.
     *
     * @return string, returns the notes field.
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * @return mixed
     */
    public function getBackgroundInfoId()
    {
        return $this->backgroundInfoId;
    }
}
