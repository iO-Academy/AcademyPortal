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
    )
    {
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
    private function sanitiseData() {
        $this->companyName = $this->sanitiseString($this->companyName);
        $this->companyName = $this->validateLength($this->companyName);
        $this->companySize = (int)$this->companySize;
        $this->techStack = $this->sanitiseString($this->techStack);
        $this->techStack = $this->validateLength($this->techStack);
        $this->postcode = $this->sanitiseString($this->postcode);
        $this->postcode = $this->validateLength($this->postcode);
        $this->phoneNumber = $this->sanitiseString($this->phoneNumber);
        $this->websiteUrl = $this->sanitiseString($this->websiteUrl);
    }

    /**(
     * Sanitise as a string in the hiring_partners_companies table as data.
     *
     * @param string $hiringPartnerData
     *
     * @return string, which will return the hiring partner data.
     */
    public function sanitiseString($hiringPartnerData){
        return filter_var($hiringPartnerData, FILTER_SANITIZE_STRING);
    }


    /**
     * Validate that a string exists, throws an error if it doesn't
     *
     * @param string $hiringPartnerData
     * @throws \Exception if the array is empty
     *
     * @return string, which will return the hiring partner data
     */
    public function validateLength($hiringPartnerData){
        if (empty($hiringPartnerData) == false){
            return $hiringPartnerData;
        } else {
            $error = $hiringPartnerData . ': string does not exist';
            throw new \Exception($error);
        }
    }

    /**
     * Gets the hiring partner company name
     *
     * @return string of company name
     */
    public function getCompanyName(){
        return $this->companyName;
    }

    /**
     * Gets the hiring partner company size
     *
     * @return string of company size
     */
    public function getCompanySize(){
        return $this->companySize;
    }

    /**
     * Gets the hiring partner tech stack
     *
     * @return string of tech stack
     */
    public function getTechStack(){
        return $this->techStack;
    }

    /**
     * Gets the hiring partner postcode
     *
     * @return string of company postcode
     */
    public function getPostcode(){
        return $this->postcode;
    }

    /**
     * Gets the hiring partner phone number
     *
     * @return string of phone number
     */
    public function getPhoneNumber(){
        return $this->phoneNumber;
    }

    /**
     * Gets the hiring partner website URL
     *
     * @return string of website url
     */
    public function getWebsiteURL(){
        return $this->websiteUrl;
    }
}