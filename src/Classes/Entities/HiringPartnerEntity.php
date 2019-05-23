<?php

namespace Portal\Entities;

class HiringPartnerEntity
{
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
        $this->companyName = $this->sanitiseString($this->companyName);
        $this->companyName = self::validateExistsAndLength($this->companyName, 255);
        $this->companySize = (int)$this->companySize;
        $this->techStack = $this->sanitiseString($this->techStack);
        $this->techStack = self::validateExistsAndLength($this->techStack, 600);
        $this->postcode = $this->sanitiseString($this->postcode);
        $this->postcode = self::validateExistsAndLength($this->postcode, 10);
        $this->phoneNumber = $this->sanitiseString($this->phoneNumber);
        $this->phoneNumber = self::validateLength($this->phoneNumber, 20);
        $this->websiteUrl = $this->sanitiseString($this->websiteUrl);
        $this->websiteUrl = self::validateLength($this->websiteUrl, 255);
    }

    /**(
     * Sanitise as a string in the hiring_partners_companies table as data.
     *
     * @param string $hiringPartnerData
     *
     * @return string, which will return the hiring partner data.
     */
    public function sanitiseString(string $hiringPartnerData) : string
    {
        return filter_var($hiringPartnerData, FILTER_SANITIZE_STRING);
    }

    /**
     * Validate that a string exists and is within length allowed, throws an error if not
     *
     * @param string $hiringPartnerData
     * @param int $characterLength
     * @throws \Exception if the array is empty
     *
     * @return string, which will return the hiring partner data
     */
    public static function validateExistsAndLength(string $hiringPartnerData, int $characterLength)
    {
        if (empty($hiringPartnerData) == false && strlen($hiringPartnerData) <= $characterLength) {
            return $hiringPartnerData;
        } else {
            throw new \Exception('An input string does not exist or is too long');
        }
    }

    /**
     * Validate that a string is not empty and is within length allowed, throws an error if not
     *
     * @param string $hiringPartnerData
     * @param int $characterLength
     * @throws \Exception if the array is empty
     *
     * @return string, which will return the hiring partner data or assigns to null
     */
    public static function validateLength(string $hiringPartnerData, int $characterLength)
    {
        if ($hiringPartnerData == '') {
            return null;
        } elseif (strlen($hiringPartnerData) <= $characterLength) {
            return $hiringPartnerData;
        } else {
            throw new \Exception('An input string does not exist or is too long');
        }
    }

    /**
     * Gets the hiring partner company name
     *
     * @return string of company name
     */
    public function getCompanyName() : string
    {
        return $this->companyName;
    }

    /**
     * Gets the hiring partner company size
     *
     * @return string of company size
     */
    public function getCompanySize() : string
    {
        return $this->companySize;
    }

    /**
     * Gets the hiring partner tech stack
     *
     * @return string of tech stack
     */
    public function getTechStack() : string
    {
        return $this->techStack;
    }

    /**
     * Gets the hiring partner postcode
     *
     * @return string of company postcode
     */
    public function getPostcode() : string
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
}
