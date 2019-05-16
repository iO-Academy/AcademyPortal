<?php

namespace Portal\Models;

use Portal\Entities\HiringPartnerContactEntity;

class HiringPartnerContactsModel
{
    private $db;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    /**
     * Queries the database to get an array of hiring partner company data
     * @param $companyId the id of the company whose contacts we are getting
     * @return array
     */
    public function getHiringPartnerContactByCompanyId(int $companyId) :array {
        $query = $this->db->prepare("SELECT `name`, `email`, `job_title`, `phone_number`, `company_id` FROM `hiring_partner_contacts` WHERE `id` = :`id`");
        $query->bindParam(':id', $companyId);
        $query->execute();
        return $query->fetchAll();
    }

    /**
     * Inserts hiring partner properties into the database
     *
     * @param HiringPartnerContactEntity $hiringPartnerContact
     * @return bool
     */
    public function createHiringPartnerContact(HiringPartnerContactEntity $hiringPartnerContact) :bool {
        $query = $this->db->prepare("INSERT INTO `hiring_partner_contacts` (
            `name`,
            `email`, 
            `job_title`,
            `phone_number`,
            `company_id`
            )
            VALUES (
            :contactName,
            :email,
            :jobTitle,
            :phoneNumber,
            :companyId
            );"
        );
        $query->bindParam(':contactName', $hiringPartnerContact->getContactName());
        $query->bindParam(':e-mail', $hiringPartnerContact->getContactEmail());
        $query->bindParam(':jobTitle', $hiringPartnerContact->getJobTitle());
        $query->bindParam(':phoneNumber', $hiringPartnerContact->getPhoneNumber());
        $query->bindParam(':companyId', $hiringPartnerContact->getCompanyId());
        return $query->execute();

    }

    /**
     * Updates the main_contact column of the hiring_partner_companies table
     *
     * @param $hiringPartnerContactId string the id of the relevant hiring partner contact
     * @param $hiringPartnerCompanyId string the id of the relevant hiring partner company
     *
     * @return bool
     */
    public function makeHiringPartnerContactMain(string $hiringPartnerContactId, string $hiringPartnerCompanyId) : bool {
        $query = $this->db->prepare("UPDATE `hiring_partner_companies` SET `main_contact` = :hiringPartnerContactId WHERE `id` = :companyId");
        $query->bindParam(':hiringPartnerContactId', $hiringPartnerContactId);
        $query->bindParam(':companyId', $hiringPartnerCompanyId);
        return $query->execute();
    }

    /**
     * Creates a new hiring partner contact entity
     *
     * @param string $hiringPartnerContactName
     * @param string $hiringPartnerContactEmail
     * @param string $hiringPartnerJobTitle
     * @param string $hiringPartnerPhoneNumber
     * @param string $hiringPartnerCompanyId
     *
     * @return HiringPartnerContactEntity new instantiation of HiringPartnerContactEntity
     */
    public function createNewHiringPartnerContact (
        string $hiringPartnerContactName,
        string $hiringPartnerContactEmail,
        string $hiringPartnerJobTitle,
        string $hiringPartnerPhoneNumber,
        string $hiringPartnerCompanyId
    )
    {
        return new HiringPartnerContactEntity(
            $hiringPartnerContactName,
            $hiringPartnerContactEmail,
            $hiringPartnerJobTitle,
            $hiringPartnerPhoneNumber,
            $hiringPartnerCompanyId
            );
    }
}