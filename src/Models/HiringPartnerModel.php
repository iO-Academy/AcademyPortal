<?php

namespace Portal\Models;

class HiringPartnerModel
{
    private $db;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    /** Inserts the properties to the database
     *
     * @param array $company Sanitise and validate the hiring partner properties as required.
     * @return bool
     */
    public function addHiringPartner(array $company): bool
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

        $query->bindParam(':companyName', $company['name']);
        $query->bindParam(':companySize', $company['companySize']);
        $query->bindParam(':techStack', $company['techStack']);
        $query->bindParam(':postcode', $company['postcode']);
        $query->bindParam(':phoneNumber', $company['phoneNumber']);
        $query->bindParam(':websiteUrl', $company['websiteUrl']);
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

    public function addNewContact(array $contact): bool
    {
        $this->db->beginTransaction();
        if ($contact['contactIsPrimary']) {
            $resetPrimaryQuery = $this->db->prepare("UPDATE `hiring_partner_contacts` 
                SET `is_primary_contact` = 0 
                WHERE `hiring_partner_company_id` = :id;");

            $resetPrimaryQuery->bindParam(':id', $contact['hiringPartnerCompanyId'], \PDO::PARAM_INT);
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

        $query->bindParam(':contactName', $contact['contactName'], \PDO::PARAM_STR);
        $query->bindParam(':contactEmail', $contact['contactEmail'], \PDO::PARAM_STR);
        $query->bindParam(':jobTitle', $contact['jobTitle'], \PDO::PARAM_STR);
        $query->bindParam(':contactPhone', $contact['contactPhone'], \PDO::PARAM_STR);
        $query->bindParam(':hiringPartnerCompanyId', $contact['contactCompanyId'], \PDO::PARAM_INT);
        $query->bindParam(':primaryContact', $contact['contactIsPrimary'], \PDO::PARAM_INT);
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
				LEFT JOIN `company_sizes`
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
     * @return array hiring partner data
     */
    public function getHiringPartnerById(int $id): array
    {
        $query = $this->db->prepare("SELECT 
					`id`, `name`, `size`, `tech_stack`, `postcode`, `phone_number`, `url_website`
					FROM `hiring_partner_companies`
					WHERE `id` = :id;");
        $query->execute(['id' => $id]);
        return $query->fetch();
    }
}
