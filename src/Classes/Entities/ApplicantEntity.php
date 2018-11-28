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
        $this->applicantCohortId = $this->sanitiseCohortId($applicantCohortId);
        $this->applicantWhyDev = $this->sanitiseWhyDev($applicantWhyDev);
        $this->applicantCodeExperience = $this->sanitiseCodeExperience($applicantCodeExperience);
        $this->$applicantHearAboutId = $this->sanitiseHearAboutId($applicantHearAboutId);
        $this->$applicantEligible = $this->sanitiseEligible($applicantEligible);
        $this->$applicantEighteenPlus = $this->sanitiseEighteenPlus($applicantEighteenPlus);
        $this->$applicantFinance = $this->sanitiseFinance($applicantFinance);
        $this->$applicantNotes = $this->sanitiseNotes($applicantNotes);

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
        if (filter_var($applicantEmail, FILTER_VALIDATE_EMAIL)) {
            return $applicantEmail;
        }
        throw new \UnexpectedValueException('Invalid Email');
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
     * Sanitise the cohort's ID in the applicant table.
     *
     * @param $applicantCohortId
     *
     * @return mixed, will return the cohort ID for the applicant.
     */
    public function sanitiseCohortId($applicantCohortId)
    {
        return filter_var($applicantCohortId, FILTER_SANITIZE_STRING);
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
     * Sanitise the hearAboutID in the applicant table.
     *
     * @param $applicantHearAboutId
     *
     * @return mixed, returns the hearAboutID field.
     */
    public function sanitiseHearAboutId($applicantHearAboutId)
    {
        return filter_var($applicantHearAboutId, FILTER_SANITIZE_STRING);
    }

    /**
     * Sanitise the applicantEligible in the applicant table.
     *
     * @param $applicantEligible
     *
     * @return mixed, returns the applicantEligible field.
     */
    public function sanitiseEligible($applicantEligible)
    {
        return filter_var($applicantEligible, FILTER_SANITIZE_STRING);
    }

    /**
     * Sanitise the applicantEighteenPlus in the applicant table.
     *
     * @param $applicantEighteenPlus
     *
     * @return mixed, return the applicantEighteenPlus field.
     */
    public function sanitiseEighteenPlus($applicantEighteenPlus)
    {
        return filter_var($applicantEighteenPlus, FILTER_SANITIZE_STRING);
    }

    /**
     * @param $applicantFinance
     * @return mixed
     */
    public function sanitiseFinance($applicantFinance)
    {
        return filter_var($applicantFinance, FILTER_SANITIZE_STRING);
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
