<?php


namespace Portal\Entities;


class ContactEntity
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


}