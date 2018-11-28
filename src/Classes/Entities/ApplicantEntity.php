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
        $this->name = $this->sanitiseString($applicantName);
        $this->email = $this->validateEmail($applicantEmail);
        $this->phoneNumber = $this->sanitiseString($applicantPhoneNumber);
        $this->cohortId = (int)$applicantCohortId;
        $this->whyDev = $this->sanitiseString($applicantWhyDev);
        $this->codeExperience = $this->sanitiseString($applicantCodeExperience);
        $this->hearAboutId = (int)$applicantHearAboutId;
        $this->eligible = $applicantEligible ? 1 : 0;
        $this->eighteenPlus = $applicantEighteenPlus ? 1 : 0;
        $this->finance = $applicantFinance ? 1 : 0;
        $this->notes = $this->sanitiseString($applicantNotes);
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
}
