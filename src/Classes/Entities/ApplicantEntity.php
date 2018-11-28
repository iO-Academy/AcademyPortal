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
     * @param $applicantData
     *
     * @return mixed, which will return the applicant data.
     */
    public function sanitiseString($applicantData)
    {
        return filter_var($applicantData, FILTER_SANITIZE_STRING);
    }

    /**(
     * Sanitise the applicant's email from the applicant's Data.
     *
     * @param $applicantData
     *
     * @return mixed, will return the applicant's data, to output the email.
     */
    public function validateEmail($applicantData)
    {
        return filter_var($applicantData, FILTER_VALIDATE_EMAIL);
    }

    /**
     * Gets the applicant's name.
     *
     * @return mixed, returns the applicant's name from that field.
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     *  Get's the applicant's email.
     *
     * @return mixed, return the applicant email from that field.
     *
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Get's the applicant's phoneNumber.
     *
     * @return mixed, returns the applicant's phoneNumber from that field.
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * Get's the applicant's cohort ID.
     *
     * @return mixed, return the cohort ID field.
     */
    public function getCohortId()
    {
        return $this->cohortId;
    }

    /**
     * Get's the applicant's whyDev.
     *
     * @return mixed, return the whyDev field.
     */
    public function getWhyDev()
    {
        return $this->whyDev;
    }

    /**
     * Get's applicantCodeExperience.
     *
     * @return mixed, returns the applicantCodeExperience field.
     */
    public function getCodeExperience()
    {
        return $this->codeExperience;
    }

    /**
     * Get's applicantHearAboutID.
     *
     * @return mixed, returns the hearAboutID field.
     */
    public function getHearAboutId()
    {
        return $this->hearAboutId;
    }

    /**
     * Get's applicantEligible.
     *
     * @return mixed, returns the applicantEligible field.
     */
    public function getEligible()
    {
        return $this->eligible;
    }

    /**
     * Get's applicantEighteenPlus.
     *
     * @return mixed, returns the applicantEighteenPlus field.
     */
    public function getEighteenPlus()
    {
        return $this->eighteenPlus;
    }

    /**
     * Get's applicantFinance.
     *
     * @return mixed, returns the applicantFinance field.
     */
    public function getFinance()
    {
        return $this->finance;
    }

    /**
     * Get's applicantNotes.
     *
     * @return mixed, returns the applicantNotes field.
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * @return mixed
     */
    public function getCohortDate()
    {
        return $this->cohortDate;
    }
}
