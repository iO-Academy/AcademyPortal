<?php


namespace Portal\Entities;


class ContactEntity extends ValidationEntity
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
        $this->hiringPartnerCompanyId = ($this->hiringPartnerCompanyId ?? $hiringPartnerCompanyId);
        $this->primaryContact = ($this->primaryContact ?? $primaryContact);

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

    private function sanitiseData()
    {
        $this->contactName = self::sanitiseString($this->contactName);
        $this->contactName = self::validateExistsAndLength($this->contactName, 255);

        $this->category = (int)$this->category;
        $this->category = self::validateCategoryExists($this->category, $this->eventCategories);
        $this->location = self::sanitiseString($this->location);
        $this->location = self::validateExistsAndLength($this->location, 255);
        $this->date = $this->validateDate($this->date);
        $this->startTime = $this->validateTime($this->startTime);
        $this->endTime = $this->validateTime($this->endTime);
        $this->validateStartEndTime($this->startTIme, $this->endTime);
        if ($this->notes !== null) {
            $this->notes = self::sanitiseString($this->notes);
            $this->notes = self::validateLength($this->notes, 5000);
        }
    }
}