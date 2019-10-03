<?php


namespace Portal\Entities;


use phpDocumentor\Reflection\Types\Boolean;
use phpDocumentor\Reflection\Types\Integer;

class ContactEntity
{
protected $
    protected
    protected
    protected
    protected
    protected
    protected

    /**
     * Gets the hiring partner company contact's name
     *
     * @return string of name
     */
    public function getContactName(): string
    {
        return $this->contactName;
    }

    /**
     * Gets the hiring partner company contact's email
     *
     * @return string email
     */
    public function getContactEmail() : string
    {
        return $this->contactEmail;
    }

    /**
     * Gets the hiring partner contact's job title
     *
     * @return string of job title
     */
    public function getContactJobTitle() : string
    {
        return $this->contactJobTitle;
    }

    /**
     * Gets the hiring partner contact's phone
     *
     * @return string of phone
     */
    public function getContactPhone() : string
    {
        return $this->contactPhone;
    }

    /**
     * Gets the hiring partner contact's company id
     *
     * @return int of company id
     */
    public function getContactCompanyId() : Integer
    {
        return $this->contactCompanyId;
    }

    /**
     * Gets the hiring partner contact's primary_contact value
     *
     * @return int of primary_contact
     */
    public function getContactIsPrimary() : Integer
    {
        return $this->contactIsPrimary;
    }
}