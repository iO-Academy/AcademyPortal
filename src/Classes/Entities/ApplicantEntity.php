<?php

namespace Portal\Entities;


class ApplicantEntity
{
    protected $name;
    protected $email;
    protected $phoneNumber;
    protected $cohortId;
    protected $whyDev;
    protected $codeExperience;
    protected $hearAboutId;
    protected $eligible;
    protected $eighteenPlus;
    protected $finance;
    protected $notes;
    protected $cohortDate;

    public function __construct(
        string $applicantName = null,
        string $applicantEmail = null,
        string $applicantPhoneNumber = null,
        int $applicantCohortId = null,
        string $applicantWhyDev = null,
        string $applicantCodeExperience = null,
        int $applicantHearAboutId = null,
        string $applicantEligible = null,
        string $applicantEighteenPlus = null,
        string $applicantFinance = null,
        string $applicantNotes = null
    )
    {
        $this->name = ($this->name ?? $applicantName);
        $this->email = ($this->email ?? $applicantEmail);
        $this->phoneNumber = ($this->phoneNumber ?? $applicantPhoneNumber);
        $this->cohortId = ($this->cohortId ?? $applicantCohortId);
        $this->whyDev = ($this->whyDev ?? $applicantWhyDev);
        $this->codeExperience = ($this->codeExperience ?? $applicantCodeExperience);
        $this->hearAboutId = ($this->hearAboutId ?? $applicantHearAboutId);
        $this->eligible = ($this->eligible ?? $applicantEligible);
        $this->eighteenPlus = ($this->eighteenPlus ?? $applicantEighteenPlus);
        $this->finance = ($this->finance ?? $applicantFinance);
        $this->notes = ($this->notes ?? $applicantNotes);

        $this->sanitiseData();

    }

    private function sanitiseData() {
        $this->name = $this->sanitiseString($this->name);
        $this->email = $this->sanitiseString($this->email);
        $this->email = $this->validateEmail($this->email);
        $this->phoneNumber = $this->sanitiseString($this->phoneNumber);
        $this->cohortId = (int)$this->cohortId;
        $this->whyDev = $this->sanitiseString($this->whyDev);
        $this->codeExperience = $this->sanitiseString($this->codeExperience);
        $this->hearAboutId = (int)$this->hearAboutId;
        $this->eligible = $this->eligible ? 1 : 0;
        $this->eighteenPlus = $this->eighteenPlus ? 1 : 0;
        $this->finance = $this->finance ? 1 : 0;
        $this->notes = $this->sanitiseString($this->notes);
    }


    /**(
     * Sanitise as a string in the applicant table as data.
     *
     * @param string $applicantData
     *
     * @return string, which will return the applicant data.
     */
    public function sanitiseString($applicantData)
    {
        return filter_var($applicantData, FILTER_SANITIZE_STRING);
    }

    /**(
     * Sanitise the applicant's email from the applicant's data.
     *
     * @param string $applicantData
     *
     * @return string $applicantData, returns valid email.
     * @return bool, returns false if invalid email.
     */
    public function validateEmail($applicantData)
    {
        if (filter_var($applicantData, FILTER_VALIDATE_EMAIL)) {
            return $applicantData;
        } else {
            return false;
        }

    }

    /**
     * Get's name.
     *
     * @return string, returns the name field.
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     *  Get's email.
     *
     * @return string, returns the email field.
     *
     */
    public function getEmail()
    {
        return $this->email;
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
     * Get's cohortDate.
     *
     * @return string, returns the cohortDate field.
     */
    public function getCohortDate()
    {
        return $this->cohortDate;
    }
}
