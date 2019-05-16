<?php

namespace Portal\Models;

use Portal\Entity\HiringPartnerContactEntity;

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
     * @param $hiringPartnerContactId the id of the relevant hiring partner contact
     * @param $hiringPartnerCompanyId the id of the relevant hiring partner company
     *
     * @return bool
     */
    public function makeHiringPartnerContactMain($hiringPartnerContactId, $hiringPartnerCompanyId) : bool {
        $query = $this->db->prepare("UPDATE `hiring_partner_companies` SET `main_contact` = :hiringPartnerContactId WHERE `id` = :companyId");
        $query->bindParam(':hiringPartnerContactId', $hiringPartnerContactId);
        $query->bindParam(':companyId', $hiringPartnerCompanyId);
        return $query->execute();
    }
}