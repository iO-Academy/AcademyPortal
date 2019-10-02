<?php

namespace Portal\Entities;

class ApplicantEntity extends ValidationEntity implements \JsonSerializable
{
    protected $id;
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
    protected $dateTimeAdded;

    public function __construct(
        int $applicantId = null,
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
    ) {
        $this->id = ($this->id ?? $applicantId);
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



    /**
     * Returns private properties from object.
     *
     * @return array|mixed
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
                  'dateTimeAdded' => $this->dateTimeAdded
               ];
    }

    /**
     * Will sanitise all the fields for an applicant.
     */
    private function sanitiseData()
    {
        $this->id = (int) $this->id;
        $this->name = self::sanitiseString($this->name);
        $this->email = self::sanitiseString($this->email);
        $this->email = $this->validateEmail($this->email);
        $this->phoneNumber = self::sanitiseString($this->phoneNumber);
        $this->cohortId = (int)$this->cohortId;
        $this->whyDev = self::sanitiseString($this->whyDev);
        $this->codeExperience = self::sanitiseString($this->codeExperience);
        $this->hearAboutId = (int)$this->hearAboutId;
        $this->eligible = $this->eligible ? 1 : 0;
        $this->eighteenPlus = $this->eighteenPlus ? 1 : 0;
        $this->finance = $this->finance ? 1 : 0;
        $this->notes = self::sanitiseString($this->notes);
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
     * Gets the Id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
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
     * Get's dateOfApplication.
     *
     * @return string, returns the dateOfApplication field.
     */
    public function getDateOfApplication()
    {
        return $this->dateTimeAdded;
    }

    /**
     * Get's cohortDate.
     *
     * @return string, returns the cohortDate field.
     */
    public function getCohortDate()
    {
        return date("F, Y", strtotime($this->cohortDate));
    }
}
