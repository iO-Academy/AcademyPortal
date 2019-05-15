<?php

namespace Portal\Models;

use Portal\Entities\HiringPartnerEntity;

class HiringPartnerModel {

    private $db;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    //Remember to type hint the HiringPartnerEntity in the param
    public function addHiringPartner($company) :bool
    {
        $query = $this->db->prepare("INSERT INTO `hiring_partner_companies` (
            `company_name`,
            `size`, 
            `tech_stack`,
            `postcode`,
            `phone_number`,
            `url_website`
            )
            VALUES (
            `:companyName`,
            `:companySize`,
            `:techStack`,
            `:postcode`,
            `:phoneNumber`,
            `:websiteUrl`
            );"
        );
        $query->bindParam(':companyName', $company->getCompanyName());
        $query->bindParam(':companySize', $company->getCompanySize());
        $query->bindParam(':techStack', $company->getTechStack());
        $query->bindParam(':postcode', $company->getPostcode());
        $query->bindParam(':phoneNumber', $company->getPhoneNumber());
        $query->bindParam(':websiteUrl', $company->getWebsiteUrl());
        return $query->execute();
    }

    public function getCompanySize() :array
    {
        $query = $this->db->prepare("SELECT `id`,`size` FROM `company_sizes`");
        $query->execute();
        return $query->fetchAll();
    }

    public function createNewHiringPartner(
        string $companyName,
        string $companySize,
        string $techStack,
        string $postocde,
        string $phoneNumber,
        string $websiteUrl
    ) :HiringPartnerEntity
    {
        return new HiringPartnerEntity(
            $companyName,
            $companySize,
            $techStack,
            $postocde,
            $phoneNumber,
            $websiteUrl
        );
    }
}