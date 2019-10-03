<?php


namespace Portal\Entities;


class ContactEntity extends ValidationEntity
{
    protected $contactName;
    protected $contactCompanyId;
    protected $contactEmail;
    protected $contactJobTitle;
    protected $contactPhone;
    protected $contactIsPrimary;

    /**
     * ContactEntity constructor.
     */
    public function __construct(
        string $contactName = null,
        int $contactCompanyId = null,
        string $contactEmail = null,
        string $contactJobTitle = null,
        string $contactPhone = null,
        int $contactIsPrimary = null
    ) {
        $this->contactName = ($this->contactName ?? $contactName);
        $this->contactCompanyId = ($this->contactCompanyId ?? $contactCompanyId);
        $this->contactEmail = ($this->contactEmail ?? $contactEmail);
        $this->contactJobTitle = ($this->contactJobTitle ?? $contactJobTitle);
        $this->contactPhone = ($this->contactPhone ?? $contactPhone);
        $this->contactIsPrimary = ($this->contactIsPrimary ?? $contactIsPrimary);

        $this->sanitiseData();
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