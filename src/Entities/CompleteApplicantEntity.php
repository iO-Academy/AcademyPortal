<?php

namespace Portal\Entities;

use Portal\Interfaces\ApplicantEntityInterface;

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
    protected $githubUsername; // string
    protected $taster; // date string
    protected $tasterAttendance; // bool
    protected $stageId; // int
    protected $team; // int
    protected $stageID;
    protected $stageOptionId;
    protected $stageOptionName;
    protected $pleskUsername;
    protected $pleskPassword;
    protected $pleskHostingUrl;
    protected $coursesId;


    /**
     * Returns private properties from object.
     *
     * @return array|mixed
     */
    public function jsonSerialize(): array
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
                  'githubUsername' => $this->githubUsername,
                  'taster' => $this->taster,
                  'tasterAttendance' => $this->tasterAttendance,
                  'team' => $this->team,
                  'stageID' => $this->stageID,
                  'stageName' => $this->stageName,
                  'stageOptionName' => $this->stageOptionName,
                  'pleskUsername' => $this->pleskUsername,
                  'pleskPassword' => $this->pleskPassword,
                  'pleskHostingUrl' => $this->pleskHostingUrl,
                  'coursesId' => $this->coursesId
               ];
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
    * @return string
    */
    public function getGithubUsername(): ?string
    {
        return $this->githubUsername;
    }

    /**
     * @return string
     */
    public function getTaster(): ?string
    {
        return $this->taster;
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

    /**
     * @return int
     */
    public function getStageID(): ?int
    {
        return $this->stageID;
    }

    /**
     * @return int
     */
    public function getStageOptionId(): ?int
    {
        return $this->stageOptionId;
    }

    /**
     * @return string
     */
    public function getStageOptionName(): ?string
    {
        return $this->stageOptionName;
    }

    /**
     * @return string
     */
    public function getPleskUsername(): ?string
    {
        return $this->pleskUsername;
    }

    /**
     * @return string
     */
    public function getPleskPassword(): ?string
    {
        return $this->pleskPassword;
    }

    /**
     * @return string
     */
    public function getPleskHostingUrl(): ?string
    {
        return $this->pleskHostingUrl;
    }

    public function getCoursesId(): ?int
    {
        return $this->coursesId;
    }
}
