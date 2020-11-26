<?php

namespace Portal\Entities;

use Portal\Interfaces\ApplicantEntityInterface;
use Portal\Validators\DateTimeValidator;
use Portal\Validators\EmailValidator;
use Portal\Validators\PhoneNumberValidator;
use Portal\Validators\StringValidator;

class CompleteApplicantEntity extends ApplicantEntity implements \JsonSerializable, ApplicantEntityInterface
{
    protected $apprentice; // bool
    protected $aptitude; // int
    protected $assessmentDay; // date string
    protected $assessmentTime; // time string
    protected $assessmentNotes; // string
    protected $diversitechInterest; // bool
    protected $diversitech; // int
    protected $edaid; // int
    protected $upfront; // int
    protected $kitCollectionDay; // date string
    protected $kitCollectionTime; // time string
    protected $kitNum; // int
    protected $laptop; // bool
    protected $laptopDeposit; // bool
    protected $laptopNum; // int
    protected $tasterId; // int
    protected $tasterAttendance; // bool
    protected $team; // int

    protected const ACADEMY_PRICE = 10000;

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
        int $applicantId = null,
        bool $apprentice = null,
        $aptitude = null,
        string $assessmentDay = null,
        string $assessmentTime = null,
        string $assessmentNotes = null,
        bool $diversitechInterest = null,
        $diversitech = null,
        $edaid = null,
        $upfront = null,
        string $kitCollectionDay = null,
        string $kitCollectionTime = null,
        $kitNum = null,
        bool $laptop = null,
        bool $laptopDeposit = null,
        $laptopNum = null,
        int $tasterId = null,
        bool $tasterAttendance = null,
        string $team = null
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
        $this->id = ($this->id ?? $applicantId);

        $this->apprentice = ($this->apprentice ?? $apprentice);
        $this->aptitude = ($this->aptitude ?? $aptitude);
        $this->assessmentDay = ($this->assessmentDay ?? $assessmentDay);
        $this->assessmentTime = ($this->assessmentTime ?? $assessmentTime);
        $this->assessmentNotes = ($this->assessmentNotes ?? $assessmentNotes);
        $this->diversitechInterest = ($this->diversitechInterest ?? $diversitechInterest);
        $this->diversitech = ($this->diversitech ?? $diversitech);
        $this->edaid = ($this->edaid ?? $edaid);
        $this->upfront = ($this->upfront ?? $upfront);
        $this->kitCollectionDay = ($this->kitCollectionDay ?? $kitCollectionDay);
        $this->kitCollectionTime = ($this->kitCollectionTime ?? $kitCollectionTime);
        $this->kitNum = ($this->kitNum ?? $kitNum);
        $this->laptop = ($this->laptop ?? $laptop);
        $this->laptopDeposit = ($this->laptopDeposit ?? $laptopDeposit);
        $this->laptopNum = ($this->laptopNum ?? $laptopNum);
        $this->tasterId = ($this->tasterId ?? $tasterId);
        $this->tasterAttendance = ($this->tasterAttendance ?? $tasterAttendance);
        $this->team = ($this->team ?? $team);

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
                  'dateTimeAdded' => $this->dateTimeAdded,
                  'apprentice' => $this->apprentice,
                  'aptitude' => $this->aptitude,
                  'assessmentDay' => $this->assessmentDay,
                  'assessmentTime' => $this->assessmentTime,
                  'assessmentNotes' => $this->assessmentNotes,
                  'diversitechInterest' => $this->diversitechInterest,
                  'diversitech' => $this->diversitech,
                  'edaid' => $this->edaid,
                  'upfront' => $this->upfront,
                  'kitCollectionDay' => $this->kitCollectionDay,
                  'kitCollectionTime' => $this->kitCollectionTime,
                  'kitNum' => $this->kitNum,
                  'laptop' => $this->laptop,
                  'laptopNum' => $this->laptopNum,
                  'tasterId' => $this->tasterId,
                  'tasterAttendance' => $this->tasterAttendance,
                  'team' => $this->team,
                  'stageID' => $this->stageID,
                  'stageName' => $this->stageName,
                  'stageOptionName' => $this->stageOptionName
               ];
    }

    /**
     * Will sanitise all the fields for an applicant.
     * @throws \Exception
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

        $this->apprentice = $this->apprentice ? 1 : 0;
        $this->aptitude = $this->aptitude ? (int)$this->aptitude : null;
        $this->assessmentDay = DateTimeValidator::validateDate($this->assessmentDay);
        $this->assessmentTime = DateTimeValidator::validateTime($this->assessmentTime);
        $this->assessmentNotes = StringValidator::sanitiseString($this->assessmentNotes);
        $this->assessmentNotes = StringValidator::validateLength($this->assessmentNotes, self::MAXTEXTLENGTH);
        if ($this->diversitechInterest !== null) {
            $this->diversitechInterest = $this->diversitechInterest ? 1 : 0;
        }
        $this->diversitech = $this->diversitech ? (int)$this->diversitech : null;
        $this->edaid = $this->edaid ? (int)$this->edaid : null;
        $this->upfront = $this->upfront ? (int)$this->upfront : null;

        if (($this->upfront + $this->edaid + $this->diversitech) > self::ACADEMY_PRICE) {
            throw new \Exception('Total payment is more than course price');
        }

        $this->kitCollectionDay = DateTimeValidator::validateDate($this->kitCollectionDay);
        $this->kitCollectionTime = DateTimeValidator::validateTime($this->kitCollectionTime);
        $this->kitNum = $this->kitNum ? (int)$this->kitNum : null;
        if ($this->laptop !== null) {
            $this->laptop = $this->laptop ? 1 : 0;
        }
        $this->laptopDeposit = $this->laptopDeposit ? 1 : 0;
        $this->laptopNum = $this->laptopNum ? (int)$this->laptopNum : null;
        $this->tasterId = $this->tasterId ? (int)$this->tasterId : null;
        $this->tasterAttendance = $this->tasterAttendance ? 1 : 0;
        $this->team = StringValidator::sanitiseString($this->team);
        $this->team = StringValidator::validateLength($this->team, self::MAXVARCHARLENGTH);
        $this->stageName = StringValidator::validateLength($this->stageName, self::MAXVARCHARLENGTH);
        $this->stageID = (int)$this->stageID;
    }

    /**
     * @return bool
     */
    public function getApprentice(): ?bool
    {
        return $this->apprentice;
    }

    /**
     * @return int
     */
    public function getAptitude(): ?int
    {
        return $this->aptitude;
    }

    /**
     * @return string
     */
    public function getAssessmentDay(): ?string
    {
        return $this->assessmentDay;
    }

    /**
     * @return string
     */
    public function getAssessmentTime(): ?string
    {
        return $this->assessmentTime;
    }

    /**
     * @return string
     */
    public function getAssessmentNotes(): ?string
    {
        return $this->assessmentNotes;
    }

    /**
     * @return bool
     */
    public function getDiversitechInterest(): ?bool
    {
        return $this->diversitechInterest;
    }

    /**
     * @return int
     */
    public function getDiversitech(): ?int
    {
        return $this->diversitech;
    }

    /**
     * @return int
     */
    public function getEdaid(): ?int
    {
        return $this->edaid;
    }

    /**
     * @return int
     */
    public function getUpfront(): ?int
    {
        return $this->upfront;
    }

    /**
     * @return string
     */
    public function getKitCollectionDay(): ?string
    {
        return $this->kitCollectionDay;
    }

    /**
     * @return string
     */
    public function getKitCollectionTime(): ?string
    {
        return $this->kitCollectionTime;
    }

    /**
     * @return int
     */
    public function getKitNum(): ?int
    {
        return $this->kitNum;
    }

    /**
     * @return bool
     */
    public function getLaptop(): ?bool
    {
        return $this->laptop;
    }

    /**
     * @return int // for some reason it doesnt like it if this is a bool?!
     */
    public function getLaptopDeposit(): ?int
    {
        return $this->laptopDeposit;
    }

    /**
     * @return int
     */
    public function getLaptopNum(): ?int
    {
        return $this->laptopNum;
    }

    /**
     * @return int
     */
    public function getTasterId(): ?int
    {
        return $this->tasterId;
    }

    /**
     * @return bool
     */
    public function getTasterAttendance(): ?bool
    {
        return $this->tasterAttendance;
    }

    /**
     * @return string
     */
    public function getTeam(): ?string
    {
        return $this->team;
    }
}
