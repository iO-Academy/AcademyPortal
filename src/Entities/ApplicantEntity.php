<?php

namespace Portal\Entities;

use Portal\Interfaces\ApplicantEntityInterface;
use Portal\Validators\EmailValidator;
use Portal\Validators\PhoneNumberValidator;
use Portal\Validators\StringValidator;

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
    protected $password;
    protected const MAXVARCHARLENGTH = 255;
    protected const MAXTEXTLENGTH = 10000;

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
        string $applicantNotes = null,
        string $applicantPassword = null,
        int $applicantId = null
    ) {
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
        $this->password = ($this->password ?? $applicantPassword);
        $this->id = ($this->id ?? $applicantId);

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
        $this->name = StringValidator::sanitiseString($this->name);
        $this->email = StringValidator::sanitiseString($this->email);
        $this->email = EmailValidator::validateEmail($this->email);
        $this->phoneNumber = StringValidator::sanitiseString($this->phoneNumber);
        $this->cohortId = (int)$this->cohortId;
        $this->whyDev = StringValidator::sanitiseString($this->whyDev);
        $this->codeExperience = StringValidator::sanitiseString($this->codeExperience);
        $this->hearAboutId = (int)$this->hearAboutId;
        $this->eligible = $this->eligible ? 1 : 0;
        $this->eighteenPlus = $this->eighteenPlus ? 1 : 0;
        $this->finance = $this->finance ? 1 : 0;
        $this->notes = StringValidator::sanitiseString($this->notes);
        $this->name = StringValidator::validateExistsAndLength($this->name, self::MAXVARCHARLENGTH);
        $this->email = StringValidator::validateExistsAndLength($this->email, self::MAXVARCHARLENGTH);
        $this->codeExperience = StringValidator::validateLength($this->codeExperience, self::MAXTEXTLENGTH);
        $this->whyDev = StringValidator::validateExistsAndLength($this->whyDev, self::MAXTEXTLENGTH);
        $this->notes = StringValidator::validateLength($this->notes, self::MAXTEXTLENGTH);
        $this->phoneNumber = PhoneNumberValidator::validatePhoneNumber($this->phoneNumber);
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
     * Gets password.
     *
     * @return string, returns the notes field.
     */
    public function getPassword()
    {
        return $this->password;
    }
}
