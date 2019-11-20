<?php

namespace Portal\Models;

use Portal\Entities\ContactEntity;
use Portal\Entities\HiringPartnerEntity;

class HiringPartnerModel
{
    private $db;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    /** Inserts the properties to the database
     *
     * @param HiringPartnerEntity $company Sanitise and validate the hiring partner properties as required.
     * @return bool
     */
    public function addHiringPartner(HiringPartnerEntity $company) :bool
    {
        $query = $this->db->prepare("INSERT INTO `hiring_partner_companies`(
            `name`,
            `size`, 
            `tech_stack`,
            `postcode`,
            `phone_number`,
            `url_website`
            )
            VALUES (
            :companyName,
            :companySize,
            :techStack,
            :postcode,
            :phoneNumber,
            :websiteUrl
            );");
        $query->bindParam(':companyName', $company->getCompanyName());
        $query->bindParam(':companySize', $company->getCompanySize());
        $query->bindParam(':techStack', $company->getTechStack());
        $query->bindParam(':postcode', $company->getPostcode());
        $query->bindParam(':phoneNumber', $company->getPhoneNumber());
        $query->bindParam(':websiteUrl', $company->getWebsiteUrl());
        return $query->execute();
    }

    /**
     * Gets all the contacts information
     *
     * @return array array with the info
     */
    public function getContactsByCompany(int $companyId) :array
    {
        $query = $this->db->prepare("SELECT
            `name`,
            `email`,
            `job_title`,
            `phone`,
            `hiring_partner_company_id`,
            `is_primary_contact`
            FROM `hiring_partner_contacts`
            WHERE `hiring_partner_company_id` = :id
            ORDER BY `is_primary_contact` DESC;");
        $query->bindParam(':id', $companyId, \PDO::PARAM_INT);
        $query->execute();
        return $query->fetchAll();
    }

    public function addNewContact(ContactEntity $contact) :bool
    {
        $this->db->beginTransaction();
        if ($contact->getPrimaryContact() == 1) {
            $resetPrimaryQuery = $this->db->prepare("UPDATE `hiring_partner_contacts` 
                SET `is_primary_contact` = 0 
                WHERE `hiring_partner_company_id` = :id;");
            $resetPrimaryQuery->bindParam(':id', $contact->getHiringPartnerCompanyId(), \PDO::PARAM_INT);
            $resetPrimaryQuery->execute();
        }
        $query = $this->db->prepare("INSERT INTO `hiring_partner_contacts`(
            `name`,
            `email`,
            `job_title`,
            `phone`,
            `hiring_partner_company_id`,
            `is_primary_contact`
            )
            VALUES (
            :contactName,
            :contactEmail,
            :jobTitle,
            :contactPhone,
            :hiringPartnerCompanyId,
            :primaryContact
            );");
        $query->bindParam(':contactName', $contact->getContactName(), \PDO::PARAM_STR);
        $query->bindParam(':contactEmail', $contact->getContactEmail(), \PDO::PARAM_STR);
        $query->bindParam(':jobTitle', $contact->getJobTitle(), \PDO::PARAM_STR);
        $query->bindParam(':contactPhone', $contact->getContactPhone(), \PDO::PARAM_STR);
        $query->bindParam(':hiringPartnerCompanyId', $contact->getHiringPartnerCompanyId(), \PDO::PARAM_INT);
        $query->bindParam(':primaryContact', $contact->getPrimaryContact(), \PDO::PARAM_INT);
        $success = $query->execute();
        $this->db->commit();
        return $success;
    }

    /** Method does a query request that picks up the id and name to be displayed on the dropdown
     *
     * @return array
     */
    public function getCompanyName() :array
    {
        $query = $this->db->prepare("SELECT `id`,`name` FROM `hiring_partner_companies`");
        $query->execute();
        return $query->fetchAll();
    }

    /** Method does a query request that picks up the id and size to be displayed on the dropdown
     *
     * @return array
     */
    public function getCompanySize() :array
    {
        $query = $this->db->prepare("SELECT `id`,`size` FROM `company_sizes`");
        $query->execute();
        return $query->fetchAll();
    }

    /** Instantiate a HiringPartnerEntity
     *
     * @param string $companyId
     * @param string $companyName
     * @param string $companySize
     * @param string $techStack
     * @param string $postcode
     * @param string $phoneNumber
     * @param string $websiteUrl
     * @return HiringPartnerEntity
     */
    public function createNewHiringPartner(
//        string $companyId,
        string $companyName,
        string $companySize,
        string $techStack,
        string $postcode,
        string $phoneNumber,
        string $websiteUrl
    ) :HiringPartnerEntity {
        return new HiringPartnerEntity(
//            $companyId,
            $companyName,
            $companySize,
            $techStack,
            $postcode,
            $phoneNumber,
            $websiteUrl
        );
    }

    /**
     * Gets all the hiring partners information
     *
     * @return array array with the info
     */
    public function getHiringPartners() :array
    {
        $query = $this->db->prepare("SELECT 
				`hiring_partner_companies`.`id`,
				`hiring_partner_companies`.`name`,
				`company_sizes`.`size`, 
				`hiring_partner_companies`.`tech_stack`, 
				`hiring_partner_companies`.`postcode`,
				`hiring_partner_companies`.`phone_number`,
				`hiring_partner_companies`.`url_website`
				FROM `hiring_partner_companies` 
				Left JOIN `company_sizes`
				ON `hiring_partner_companies`.`size` = `company_sizes`.`id`;");
        $query->execute();
        return $query->fetchAll();
    }

    /**
     * Gets a single hiring partners information
     *
     * @return array array with the info
     */
    public function getDetailsByCompany(int $id) :array
    {
        $query = $this->db->prepare("SELECT 
					`id`, `name`, `size`, `tech_stack`, `postcode`, `phone_number`, `url_website`
					FROM `hiring_partner_companies`
					WHERE `id` = :id;");
        $query->execute(['id'=>$id]);
        return $query->fetchAll();
    }
}
