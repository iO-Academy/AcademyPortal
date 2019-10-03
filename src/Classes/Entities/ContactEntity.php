<?php


namespace Portal\Entities;

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
}
