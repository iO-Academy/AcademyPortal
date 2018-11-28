<?php

namespace Portal\Entities;


class ApplicantEntity
{
    protected $applicantName;
    protected $applicantEmail;
    protected $applicantPhoneNumber;
    protected $applicantCohortId;
    protected $applicantWhyDev;
    protected $applicantCodeExperience;
    protected $applicantHearAboutId;
    protected $applicantEligible;
    protected $applicantEighteenPlus;
    protected $applicantFinance;
    protected $applicantNotes;

    public function __construct(
        string $applicantName,
        string $applicantEmail,
        string $applicantPhoneNumber,
        int $applicantCohortId,
        string $applicantWhyDev,
        string $applicantCodeExperience,
        int $applicantHearAboutId,
        string $applicantEligible,
        string $applicantEighteenPlus,
        string $applicantFinance,
        string $applicantNotes
    )
    {
        $this->applicantName = $this->sanitiseString($applicantName);
        $this->applicantEmail = $this->sanitiseEmail($applicantEmail);
        $this->applicantPhoneNumber = $this->sanitiseString($applicantPhoneNumber);
        $this->applicantCohortId = (int)$applicantCohortId;
        $this->applicantWhyDev = $this->sanitiseString($applicantWhyDev);
        $this->applicantCodeExperience = $this->sanitiseString($applicantCodeExperience);
        $this->applicantHearAboutId = (int)$applicantHearAboutId;
        $this->applicantEligible = $applicantEligible ? 1 : 0;
        $this->applicantEighteenPlus = $applicantEighteenPlus ? 1 : 0;
        $this->applicantFinance = $applicantFinance ? 1 : 0;
        $this->applicantNotes = $this->sanitiseString($applicantNotes);
    }

    /**(
     * Sanitise as a string in the applicant table as data.
     *
     * @param $applicantName
     *
     * @return mixed, which will return the applicant data.
     */
    public function sanitiseString($applicantData)
    {
        return filter_var($applicantData, FILTER_SANITIZE_STRING);
    }

    /**(
     * Sanitise the applicant's email in the applicant table.
     *
     * @param $applicantEmail
     *
     * @return mixed, will return the applicant's email.
     */
    public function sanitiseEmail($applicantEmail)
    {
        return $applicantEmail = filter_var($applicantEmail, FILTER_VALIDATE_EMAIL);
    }

    /**
     * Gets the applicant's name.
     *
     * @return mixed, returns the applicant's name from that field.
     */
    public function getApplicantName()
    {
        return $this->applicantName;
    }

    /**
     *  Get's the applicant's email.
     *
     * @return mixed, return the applicant email from that field.
     *
     */
    public function getApplicantEmail()
    {
        return $this->applicantEmail;
    }

    /**
     * Get's the applicant's phoneNumber.
     *
     * @return mixed, returns the applicant's phoneNumber from that field.
     */
    public function getApplicantPhoneNumber()
    {
        return $this->applicantPhoneNumber;
    }

    /**
     * Get's the applicant's cohort ID.
     *
     * @return mixed, return the cohort ID field.
     */
    public function getApplicantCohortId()
    {
        return $this->applicantCohortId;
    }

    /**
     * Get's the applicant's whyDev.
     *
     * @return mixed, return the whyDev field.
     */
    public function getApplicantWhyDev()
    {
        return $this->applicantWhyDev;
    }

    /**
     * Get's applicantCodeExperience.
     *
     * @return mixed, returns the applicantCodeExperience field.
     */
    public function getApplicantCodeExperience()
    {
        return $this->applicantCodeExperience;
    }

    /**
     * Get's applicantHearAboutID.
     *
     * @return mixed, returns the hearAboutID field.
     */
    public function getApplicantHearAboutId()
    {
        return $this->applicantHearAboutId;
    }

    /**
     * Get's applicantEligible.
     *
     * @return mixed, returns the applicantEligible field.
     */
    public function getApplicantEligible()
    {
        return $this->applicantEligible;
    }

    /**
     * Get's applicantEighteenPlus.
     *
     * @return mixed, returns the applicantEighteenPlus field.
     */
    public function getApplicantEighteenPlus()
    {
        return $this->applicantEighteenPlus;
    }

    /**
     * Get's applicantFinance.
     *
     * @return mixed, returns the applicantFinance field.
     */
    public function getApplicantFinance()
    {
        return $this->applicantFinance;
    }

    /**
     * Get's applicantNotes.
     *
     * @return mixed, returns the applicantNotes field.
     */
    public function getApplicantNotes()
    {
        return $this->applicantNotes;
    }
}
