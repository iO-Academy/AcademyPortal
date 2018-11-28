<?php

namespace Portal\Entities;


class ApplicantEntity
{
    public $applicantName;
    public $applicantEmail;
    public $applicantPhoneNumber;
    public $applicantCohortId;
    public $applicantWhyDev;
    public $applicantCodeExperience;
    public $applicantHearAboutId;
    public $applicantEligible;
    public $applicantEighteenPlus;
    public $applicantFinance;
    public $applicantNotes;

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
        $this->applicantName = $this->sanitiseName($applicantName);
        $this->applicantEmail = $this->sanitiseEmail($applicantEmail);
        $this->applicantPhoneNumber = $this->sanitisePhoneNumber($applicantPhoneNumber);
        $this->applicantCohortId = (int)$applicantCohortId;
        $this->applicantWhyDev = $this->sanitiseWhyDev($applicantWhyDev);
        $this->applicantCodeExperience = $this->sanitiseCodeExperience($applicantCodeExperience);
        $this->applicantHearAboutId = (int)$applicantHearAboutId;
        $this->applicantEligible = $applicantEligible ? 1 : 0;
        $this->applicantEighteenPlus = $applicantEighteenPlus ? 1 : 0;
        $this->applicantFinance = $applicantFinance ? 1 : 0;
        $this->applicantNotes = $this->sanitiseNotes($applicantNotes);
    }

    /**(
     * Sanitise the applicant's name in the applicant table.
     *
     * @param $applicantName
     *
     * @return mixed, which will return the applicants name.
     */
    public function sanitiseName($applicantName)
    {
        return filter_var($applicantName, FILTER_SANITIZE_STRING);
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
     * Sanitise phoneNumber's in the applicant table.
     *
     * @param $applicantPhoneNumber
     *
     * @return mixed, will return the applicant's phoneNumber
     */
    public function sanitisePhoneNumber($applicantPhoneNumber)
    {
        return filter_var($applicantPhoneNumber, FILTER_SANITIZE_STRING);
    }

    /**
     * Sanitise the whyDev in the applicant table.
     *
     * @param $applicantWhyDev
     *
     * @return mixed, will return the whyDev for the applicant.
     */
    public function sanitiseWhyDev($applicantWhyDev)
    {
        return filter_var($applicantWhyDev, FILTER_SANITIZE_STRING);
    }

    /**
     * Sanitise the codeExperience in the applicant table.
     *
     * @param $applicantCodeExperience
     *
     * @return mixed, returns the codeExperience field
     */
    public function sanitiseCodeExperience($applicantCodeExperience)
    {
        return filter_var($applicantCodeExperience, FILTER_SANITIZE_STRING);
    }

    /**
     * @param $applicantNotes
     * @return mixed
     */
    public function sanitiseNotes($applicantNotes)
    {
        return filter_var($applicantNotes, FILTER_SANITIZE_STRING);
    }

    /**
     * @return mixed
     */
    public function getApplicantName()
    {
        return $this->applicantName;
    }

    /**
     * @return mixed
     */
    public function getApplicantEmail()
    {
        return $this->applicantEmail;
    }

    /**
     * @return mixed
     */
    public function getApplicantPhoneNumber()
    {
        return $this->applicantPhoneNumber;
    }

    /**
     * @return mixed
     */
    public function getApplicantCohortId()
    {
        return $this->applicantCohortId;
    }

    /**
     * @return mixed
     */
    public function getApplicantWhyDev()
    {
        return $this->applicantWhyDev;
    }

    /**
     * @return mixed
     */
    public function getApplicantCodeExperience()
    {
        return $this->applicantCodeExperience;
    }

    /**
     * @return mixed
     */
    public function getApplicantHearAboutId()
    {
        return $this->applicantHearAboutId;
    }

    /**
     * @return mixed
     */
    public function getApplicantEligible()
    {
        return $this->applicantEligible;
    }

    /**
     * @return mixed
     */
    public function getApplicantEighteenPlus()
    {
        return $this->applicantEighteenPlus;
    }

    /**
     * @return mixed
     */
    public function getApplicantFinance()
    {
        return $this->applicantFinance;
    }

    /**
     * @return mixed
     */
    public function getApplicantNotes()
    {
        return $this->applicantNotes;
    }
}
