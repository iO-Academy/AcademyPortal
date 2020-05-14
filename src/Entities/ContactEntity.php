<?php

namespace Portal\Entities;

use Portal\Validators\StringValidator;

class ContactEntity
{
    protected $contactName;
    protected $contactEmail;
    protected $jobTitle;
    protected $contactPhone;
    protected $hiringPartnerCompanyId;
    protected $primaryContact;


    public function __construct(
        string $contactName = null,
        string $contactEmail = null,
        string $jobTitle = null,
        string $contactPhone = null,
        int $hiringPartnerCompanyId = null,
        int $primaryContact = null
    ) {
        $this->contactName = ($this->contactName ?? $contactName);
        $this->contactEmail = ($this->contactEmail ?? $contactEmail);
        $this->jobTitle = ($this->jobTitle ?? $jobTitle);
        $this->contactPhone = ($this->contactPhone ?? $contactPhone);
        $this->hiringPartnerCompanyId = ($this->hiringPartnerCompanyId ?? (int)$hiringPartnerCompanyId);
        $this->primaryContact = ($this->primaryContact ?? (int)$primaryContact);

        $this->sanitiseData();
    }

    /**
     * Get contact name
     *
     * @return string
     */
    public function getContactName()
    {
        return $this->contactName;
    }

    /**
     * Get contact email
     *
     * @return string
     */
    public function getContactEmail()
    {
        return $this->contactEmail;
    }

    /**
     * get job title
     *
     * @return string
     */
    public function getJobTitle()
    {
        return $this->jobTitle;
    }

    /**
     * Get phone number
     *
     * @return string
     */
    public function getContactPhone()
    {
        return $this->contactPhone;
    }

    /**
     * Get hiring partner company id
     *
     * @return string
     */
    public function getHiringPartnerCompanyId()
    {
        return $this->hiringPartnerCompanyId;
    }

    /**
     * Get primary contact
     *
     * @return int
     */
    public function getPrimaryContact()
    {
        return $this->primaryContact;
    }

    /**
     * Will sanitise all the fields for adding contact details
     *
     * @throws \Exception
     */
    private function sanitiseData()
    {
        $this->contactName = StringValidator::sanitiseString($this->contactName);
        $this->contactName = StringValidator::validateExistsAndLength($this->contactName, 255);

        $this->contactEmail = StringValidator::sanitiseString($this->contactEmail);
        $this->contactEmail = StringValidator::validateExistsAndLength($this->contactEmail, 255);
        if ($this->jobTitle !== null) {
            $this->jobTitle = StringValidator::sanitiseString($this->jobTitle);
            $this->jobTitle = StringValidator::ValidateLength($this->jobTitle, 255);
        }
        if ($this->contactPhone !== null) {
            $this->contactPhone = StringValidator::sanitiseString($this->contactPhone);
            $this->contactPhone = StringValidator::ValidateLength($this->contactPhone, 20);
        }
        $this->hiringPartnerCompanyId = (int)$this->hiringPartnerCompanyId;
        $this->primaryContact = (int)$this->primaryContact;
        $this->primaryContact = $this->isPrimaryContact($this->primaryContact);
    }

    /**
     * checks if the value for primaryContact is 0 or 1
     *
     * @param int $primaryContact
     * @throws \Exception
     * @return $primaryContact
     */
    public function isPrimaryContact(int $primaryContact)
    {
        if ($primaryContact === 0 || $primaryContact === 1) {
            return $primaryContact;
        } else {
            throw new \Exception('Primary contact is not valid.');
        }
    }
}
