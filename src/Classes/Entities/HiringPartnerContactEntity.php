<?php

namespace Portal\Entities;

class HiringPartnerContactEntity
{
    protected $contactName;
    protected $contactEmail;
    protected $jobTitle;
    protected $phoneNumber;
    protected $companyId;

    public function __construct(
        string $hiringPartnerContactName = null,
        string $hiringPartnerContactEmail = null,
        string $hiringPartnerJobTitle = null,
        string $hiringPartnerPhoneNumber = null,
        string $hiringPartnerCompanyId = null
    )
    {
        $this->contactName = ($this->contactName ?? $hiringPartnerContactName);
        $this->contactEmail = ($this->contactEmail ?? $hiringPartnerContactEmail);
        $this->jobTitle = ($this->jobTitle ?? $hiringPartnerJobTitle);
        $this->phoneNumber = ($this->phoneNumber ?? $hiringPartnerPhoneNumber);
        $this->companyId = ($this->companyId ?? $hiringPartnerCompanyId);

        $this->sanitiseData();

    }

    /**
     * Will sanitise and validate the hiring partner properties as required.
     */
    private function sanitiseData() {
        $this->contactName = $this->sanitiseString($this->contactName);
        $this->contactName = self::validateExistsAndLength($this->contactName, 255);
        $this->contactEmail = $this->sanitiseString($this->contactEmail);
        $this->contactEmail = self::validateExistsAndLength($this->contactEmail, 255);
        $this->jobTitle = $this->sanitiseString($this->jobTitle);
        $this->jobTitle = self::validateExistsAndLength($this->jobTitle, 255);
        $this->phoneNumber = $this->sanitiseString($this->phoneNumber);
        $this->phoneNumber = self::validateLength($this->phoneNumber, 20);
        $this->companyId = $this->sanitiseString($this->companyId);
        $this->companyId = self::validateExistsAndLength($this->companyId, 4);
    }

    /**(
     * Sanitise as a string in the hiring_partners_contacts table as data.
     *
     * @param string $hiringPartnerContactData
     *
     * @return string, which will return the hiring partner contact data.
     */
    public function sanitiseString(string $hiringPartnerContactData) : string {
        return filter_var($hiringPartnerContactData, FILTER_SANITIZE_STRING);
    }

    /**
     * Validate that a string exists and is within length allowed, throws an error if not
     *
     * @param string $hiringPartnerContactData
     * @param int $characterLength
     * @throws \Exception if the array is empty
     *
     * @return string, which will return the hiring partner contact data
     */
    public static function validateExistsAndLength(string $hiringPartnerContactData, int $characterLength){
        if (empty($hiringPartnerContactData) == false && strlen($hiringPartnerContactData) <= $characterLength){
            return $hiringPartnerContactData;
        } else {
            throw new \Exception('An input string does not exist or is too long');
        }
    }

    /**
     * Validate that a string is not empty and is within length allowed, throws an error if not
     *
     * @param string $hiringPartnerContactData
     * @param int $characterLength
     * @throws \Exception if the array is empty
     *
     * @return string, which will return the hiring partner contact data or assigns to null
     */
    public static function validateLength(string $hiringPartnerContactData, int $characterLength){
        if ($hiringPartnerContactData == '') {
            return null;
        } else if (strlen($hiringPartnerContactData) <= $characterLength){
            return $hiringPartnerContactData;
        } else {
            throw new \Exception('An input string does not exist or is too long');
        }
    }

    /**
     * Gets the hiring partner contact name
     *
     * @return string of contact name
     */
    public function getContactName() : string {
        return $this->contactName;
    }

    /**
     * Gets the hiring partner contact email
     *
     * @return string of contact email
     */
    public function getContactEmail() : string {
        return $this->contactEmail;
    }

    /**
     * Gets the contact's job title
     *
     * @return string of contact's job title
     */
    public function getJobTitle() : string {
        return $this->jobTitle;
    }

    /**
     * Gets the hiring partner contact's phone number
     *
     * @return string of phone number or null
     */
    public function getPhoneNumber() {
        return $this->phoneNumber;
    }

    /**
     * Gets the hiring partner company ID
     *
     * @return int of company ID
     */
    public function getCompanyId() : int {
        return $this->companyId;
    }
}