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
    protected $taster; // date string
    protected $tasterId; // int
    protected $tasterAttendance; // bool
    protected $stageId; // int
    protected $team; // int
    protected $stageID;
    protected $isStudentStage;
    protected $stageOptionId;
    protected $stageOptionName;
    protected $githubUsername;
    protected $portfolioUrl;
    protected $pleskHostingUrl;
    protected $githubEducationLink;
    protected $additionalNotes;
    protected $chosenCourseId;
    protected $chosenCourseDate;
    protected $backgroundInfoId;
    protected $backgroundInfo;
    protected $attitude;
    protected $averageScore;
    protected $fee;
    protected $signedTerms;
    protected $signedDiversitech;
    protected $inductionEmailSent;
    protected $contactFormSigned;
    protected $signedNDA;
    protected $checkedID;
    protected $dataProtectionName;
    protected $dataProtectionPhoto;
    protected $dataProtectionTestimonial;
    protected $dataProtectionBio;
    protected $dataProtectionVideo;


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
                  'taster' => $this->taster,
                  'tasterId' => $this->tasterId,
                  'tasterAttendance' => $this->tasterAttendance,
                  'team' => $this->team,
                  'stageID' => $this->stageID,
                  'isStudentStage' => $this->isStudentStage,
                  'stageName' => $this->stageName,
                  'stageOptionName' => $this->stageOptionName,
                  'githubUsername' => $this->githubUsername,
                  'portfolioUrl' => $this->portfolioUrl,
                  'pleskHostingUrl' => $this->pleskHostingUrl,
                  'githubEducationLink' => $this->githubEducationLink,
                  'additionalNotes' => $this->additionalNotes,
                  'chosenCourseId' => $this->chosenCourseId,
                  'backgroundInfoId' => $this->backgroundInfoId,
                  'backgroundInfo' => $this->backgroundInfo,
                  'attitude' => $this->attitude,
                  'averageScore' => $this->averageScore,
                  'fee' => $this->fee,
                  'signedTerms' => $this->signedTerms,
                  'signedDiversitech' => $this->signedDiversitech,
                  'inductionEmailSent' => $this->inductionEmailSent,
                  'signedNDA' => $this->signedNDA,
                  'checkedID' => $this->checkedID,
                  'dataProtectionName' => $this->dataProtectionName,
                  'dataProtectionPhoto' => $this->dataProtectionPhoto,
                  'dataProtectionTestimonial' => $this->dataProtectionTestimonial,
                  'dataProtectionBio' => $this->dataProtectionBio,
                  'dataProtectionVideo' => $this->dataProtectionVideo,
                  'chosenCourseDate' => $this->chosenCourseDate,
                  'chosenCourseDatePretty' => $this->getChosenCourseDatePretty()
        ];
    }

    /**
     * @return mixed
     */
    public function getBackgroundInfoId()
    {
        return $this->backgroundInfoId;
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
    public function getTaster(): ?string
    {
        return $this->taster;
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

    /**
     * @return int
     */
    public function getStageID(): ?int
    {
        return $this->stageID;
    }

    /**
     * @return mixed
     */
    public function isStudentStage()
    {
        return $this->isStudentStage;
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
     * @return mixed
     */
    public function getGithubUsername(): ?string
    {
        return $this->githubUsername;
    }

    /**
     * @return mixed
     */
    public function getPortfolioUrl(): ?string
    {
        return $this->portfolioUrl;
    }

    /**
     * @return mixed
     */
    public function getPleskHostingUrl(): ?string
    {
        return $this->pleskHostingUrl;
    }

    /**
     * @return mixed
     */
    public function getGithubEducationLink(): ?string
    {
        return $this->githubEducationLink;
    }

    /**
     * @return mixed
     */
    public function getAdditionalNotes(): ?string
    {
        return $this->additionalNotes;
    }

    /**
     * @return mixed
     */
    public function getChosenCourseId(): ?int
    {
        return $this->chosenCourseId;
    }

    /**
     * @return mixed
     */
    public function getChosenCourseDatePretty(): ?string
    {
        return !empty($this->chosenCourseDate) ? date("F, Y", strtotime($this->chosenCourseDate)) : null;
    }

    /**
     * @return mixed
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * @return mixed
     */
    public function getAttitude()
    {
        return $this->attitude;
    }

    /**
     * @return mixed
     */
    public function getAverageScore()
    {
        return $this->averageScore;
    }

    /**
     * @return mixed
     */
    public function getFee()
    {
        return $this->fee;
    }

    /**
     * @return mixed
     */
    public function getSignedTerms()
    {
        return $this->signedTerms;
    }

    /**
     * @return mixed
     */
    public function getSignedDiversitech()
    {
        return $this->signedDiversitech;
    }

    /**
     * @return mixed
     */
    public function getInductionEmailSent()
    {
        return $this->inductionEmailSent;
    }

    /**
     * @return mixed
     */
    public function getSignedNDA()
    {
        return $this->signedNDA;
    }

    /**
     * @return mixed
     */
    public function getCheckedID()
    {
        return $this->checkedID;
    }

    /**
     * @return mixed
     */
    public function getDataProtectionName()
    {
        return $this->dataProtectionName;
    }

    /**
     * @return mixed
     */
    public function getDataProtectionPhoto()
    {
        return $this->dataProtectionPhoto;
    }

    /**
     * @return mixed
     */
    public function getDataProtectionTestimonial()
    {
        return $this->dataProtectionTestimonial;
    }

    /**
     * @return mixed
     */
    public function getDataProtectionBio()
    {
        return $this->dataProtectionBio;
    }

    /**
     * @return mixed
     */
    public function getDataProtectionVideo()
    {
        return $this->dataProtectionVideo;
    }

    /**
     * @return mixed
     */
    public function getContactFormSigned()
    {
        return $this->contactFormSigned;
    }

    /**
     * @return mixed
     */
    public function getBackgroundInfo()
    {
        return $this->backgroundInfo;
    }
}
