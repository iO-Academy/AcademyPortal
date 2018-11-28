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
     * @param $applicantName
     * @return mixed
     */
    public function sanitiseName($applicantName)
    {
        return filter_var($applicantName, FILTER_SANITIZE_STRING);
    }

    /**(
     * @param $applicantEmail
     * @return mixed
     */
    public function sanitiseEmail($applicantEmail)
    {
        if (filter_var($applicantEmail, FILTER_VALIDATE_EMAIL)) {
            return $applicantEmail;
        }
        throw new \UnexpectedValueException('Invalid Email');
    }

    /**
     * @param $applicantPhoneNumber
     * @return mixed
     */
    public function sanitisePhoneNumber($applicantPhoneNumber)
    {
        return filter_var($applicantPhoneNumber, FILTER_SANITIZE_STRING);
    }

    /**
     * @param $applicantCohortId
     * @return mixed
     */
    public function sanitiseCohortId($applicantCohortId)
    {
        return filter_var($applicantCohortId, FILTER_SANITIZE_STRING);
    }

    /**
     * @param $applicantWhyDev
     * @return mixed
     */
    public function sanitiseWhyDev($applicantWhyDev)
    {
        return filter_var($applicantWhyDev, FILTER_SANITIZE_STRING);
    }

    /**
     * @param $applicantCodeExperience
     * @return mixed
     */
    public function sanitiseCodeExperience($applicantCodeExperience)
    {
        return filter_var($applicantCodeExperience, FILTER_SANITIZE_STRING);
    }

    /**
     * @param $applicantHearAboutId
     * @return mixed
     */
    public function sanitiseHearAboutId($applicantHearAboutId)
    {
        return filter_var($applicantHearAboutId, FILTER_SANITIZE_STRING);
    }

    /**
     * @param $applicantEligible
     * @return mixed
     */
    public function sanitiseEligible($applicantEligible)
    {
        return filter_var($applicantEligible, FILTER_SANITIZE_STRING);
    }

    /**
     * @param $applicantEighteenPlus
     * @return mixed
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