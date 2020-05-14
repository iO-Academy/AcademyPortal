<?php

namespace Portal\Entities;

use Portal\Validators\StringValidator;

class HiringPartnerEntity
{
    protected $companyId;
    protected $companyName;
    protected $companySize;
    protected $techStack;
    protected $postcode;
    protected $phoneNumber;
    protected $websiteUrl;

    public function __construct(
        string $hiringPartnerCompanyName = null,
        int $hiringPartnerCompanySize = null,
        string $hiringPartnerTechStack = null,
        string $hiringPartnerPostcode = null,
        string $hiringPartnerPhoneNumber = null,
        string $hiringPartnerWebsiteUrl = null
    ) {
        $this->companyName = ($this->companyName ?? $hiringPartnerCompanyName);
        $this->companySize = ($this->companySize ?? $hiringPartnerCompanySize);
        $this->techStack = ($this->techStack ?? $hiringPartnerTechStack);
        $this->postcode = ($this->postcode ?? $hiringPartnerPostcode);
        $this->phoneNumber = ($this->phoneNumber ?? $hiringPartnerPhoneNumber);
        $this->websiteUrl = ($this->websiteUrl ?? $hiringPartnerWebsiteUrl);

        $this->sanitiseData();
    }

    /**
     * Will sanitise and validate the hiring partner properties as required.
     */
    private function sanitiseData()
    {
        $this->companyId = (int)$this->companyId;
        $this->companyName = StringValidator::sanitiseString($this->companyName);
        $this->companyName = StringValidator::validateExistsAndLength($this->companyName, 255);
        $this->companySize = (int)$this->companySize;
        $this->techStack = StringValidator::sanitiseString($this->techStack);
        $this->techStack = StringValidator::validateExistsAndLength($this->techStack, 600);
        $this->postcode = StringValidator::sanitiseString($this->postcode);
        $this->postcode = StringValidator::validateExistsAndLength($this->postcode, 10);
        $this->phoneNumber = StringValidator::sanitiseString($this->phoneNumber);
        $this->phoneNumber = StringValidator::validateLength($this->phoneNumber, 20);
        $this->websiteUrl = StringValidator::sanitiseString($this->websiteUrl);
        $this->websiteUrl = StringValidator::validateLength($this->websiteUrl, 255);
    }

    /**
     * Gets the hiring partner company Id
     *
     * @return string of company ID
     */
    public function getCompanyId(): Int
    {
        return $this->companyId;
    }

    /**
     * Gets the hiring partner company name
     *
     * @return string of company name
     */
    public function getCompanyName(): string
    {
        return $this->companyName;
    }

    /**
     * Gets the hiring partner company size
     *
     * @return string of company size
     */
    public function getCompanySize(): string
    {
        return $this->companySize;
    }

    /**
     * Gets the hiring partner tech stack
     *
     * @return string of tech stack
     */
    public function getTechStack(): string
    {
        return $this->techStack;
    }

    /**
     * Gets the hiring partner postcode
     *
     * @return string of company postcode
     */
    public function getPostcode(): string
    {
        return $this->postcode;
    }

    /**
     * Gets the hiring partner phone number
     *
     * @return string of phone number or null
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * Gets the hiring partner website URL
     *
     * @return string of website url or null
     */
    public function getWebsiteURL()
    {
        return $this->websiteUrl;
    }

    /**
     * @return array of hiring entity properties
     */
    public function hiringPartnerEntityToArray() :array
    {
        $hiringPartnerEntityAsArray = [
            'companyID' => $this->getCompanyId(),
            'companyName' => $this->getCompanyName(),
            'companySize' => $this->getCompanySize(),
            'techStack' => $this->getTechStack(),
            'postcode' => $this->getTechStack(),
            'phoneNumber' => $this->getPhoneNumber(),
            'websiteUrl' => $this->getWebsiteURL()
        ];
        return $hiringPartnerEntityAsArray;
    }
}
