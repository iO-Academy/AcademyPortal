<?php

namespace Portal\Entities;

use Portal\Interfaces\ApplicantEntityInterface;

class ApplicantEntity extends BaseApplicantEntity implements \JsonSerializable, ApplicantEntityInterface
{
    protected $phoneNumber;
    protected $courseAppliedToId;
    protected $whyDev;
    protected $codeExperience;
    protected $hearAboutId;
    protected $eligible;
    protected $eighteenPlus;
    protected $finance;
    protected $notes;
    protected $stageID;

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
                  'cohortID' => $this->courseAppliedToId,
                  'whyDev' => $this->whyDev,
                  'codeExperience' => $this->codeExperience,
                  'hearAboutId' => $this->hearAboutId,
                  'eligible' => $this->eligible,
                  'eighteenPlus' => $this->eighteenPlus,
                  'finance' => $this->finance,
                  'notes' => $this->notes,
                  'cohortDate' => $this->getCohortDate(),
                  'dateTimeAdded' => $this->dateTimeAdded
               ];
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
        return $this->courseAppliedToId;
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
}
