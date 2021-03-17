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
    public function addHiringPartner(HiringPartnerEntity $company): bool
    {
        $query = $this->db->prepare("INSERT INTO `hiring_partner_companies`(
            `id`,
            `name`,
            `size`, 
            `tech_stack`,
            `postcode`,
            `phone_number`,
            `url_website`
            )
            VALUES (
            :companyId,
            :companyName,
            :companySize,
            :techStack,
            :postcode,
            :phoneNumber,
            :websiteUrl
            );");

        $companyId = $company->getCompanyId();
        $companyName = $company->getCompanyName();
        $companySize = $company->getCompanySize();
        $techStack = $company->getTechStack();
        $postCode = $company->getPostcode();
        $phoneNumber = $company->getPhoneNumber();
        $websiteUrl = $company->getWebsiteUrl();

        $query->bindParam(':companyId', $companyId);
        $query->bindParam(':companyName', $companyName);
        $query->bindParam(':companySize', $companySize);
        $query->bindParam(':techStack', $techStack);
        $query->bindParam(':postcode', $postCode);
        $query->bindParam(':phoneNumber', $phoneNumber);
        $query->bindParam(':websiteUrl', $websiteUrl);
        return $query->execute();
    }

    /**
     * Gets all the contacts information
     *
     * @return array array with the info
     */
    public function getContactsByCompany(int $companyId): array
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

    public function addNewContact(ContactEntity $contact): bool
    {
        $this->db->beginTransaction();
        if ($contact->getPrimaryContact() == 1) {
            $resetPrimaryQuery = $this->db->prepare("UPDATE `hiring_partner_contacts` 
                SET `is_primary_contact` = 0 
                WHERE `hiring_partner_company_id` = :id;");

            $hiringPartnerCompanyId = $contact->getHiringPartnerCompanyId();

            $resetPrimaryQuery->bindParam(':id', $hiringPartnerCompanyId, \PDO::PARAM_INT);
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

        $contactName = $contact->getContactName();
        $contactEmail = $contact->getContactEmail();
        $jobTitle = $contact->getJobTitle();
        $contactPhone = $contact->getContactPhone();
        $hiringPartnerCompanyId = $contact->getHiringPartnerCompanyId();
        $primaryContact = $contact->getPrimaryContact();

        $query->bindParam(':contactName', $contactName, \PDO::PARAM_STR);
        $query->bindParam(':contactEmail', $contactEmail, \PDO::PARAM_STR);
        $query->bindParam(':jobTitle', $jobTitle, \PDO::PARAM_STR);
        $query->bindParam(':contactPhone', $contactPhone, \PDO::PARAM_STR);
        $query->bindParam(':hiringPartnerCompanyId', $hiringPartnerCompanyId, \PDO::PARAM_INT);
        $query->bindParam(':primaryContact', $primaryContact, \PDO::PARAM_INT);
        $success = $query->execute();
        $this->db->commit();
        return $success;
    }

    /** Method does a query request that picks up the id and name to be displayed on the dropdown
     *
     * @return array
     */
    public function getCompanyName(): array
    {
        $query = $this->db->prepare("SELECT `id`,`name` FROM `hiring_partner_companies`");
        $query->execute();
        return $query->fetchAll();
    }

    /** Method does a query request that picks up the id and size to be displayed on the dropdown
     *
     * @return array
     */
    public function getCompanySize(): array
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
        string $companyName,
        string $companySize,
        string $techStack,
        string $postcode,
        string $phoneNumber,
        string $websiteUrl
    ): HiringPartnerEntity {
        return new HiringPartnerEntity(
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
    public function getHiringPartners(): array
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
    public function getDetailsByCompany(int $id): array
    {
        $query = $this->db->prepare("SELECT 
					`id`, `name`, `size`, `tech_stack`, `postcode`, `phone_number`, `url_website`
					FROM `hiring_partner_companies`
					WHERE `id` = :id;");
        $query->execute(['id' => $id]);
        return $query->fetch();
    }

    /**
     * Gets a single hiring partner's information
     *
     * @param int Hiring Partner Id
     *
     * @return HiringPartnerEntity hiring partner entity
     */
    public function getHiringPartnerById(int $id): array
    {
        $query = $this->db->prepare("SELECT 
					`id`, `name`, `size`, `tech_stack`, `postcode`, `phone_number`, `url_website`
					FROM `hiring_partner_companies`
					WHERE `id` = :id;");
        $success = $query->execute(['id' => $id]);
        $entity = $query->fetch();
        $returnData = ['entity' => $entity, 'success' => $success];
        return $returnData;
    }
}
