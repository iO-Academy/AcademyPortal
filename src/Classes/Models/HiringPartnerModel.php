<?php

namespace Portal\Models;

class HiringPartnerModel {

    private $db;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    public function addHiringPartner($newCompanyName) {
        $query = $this->db->prepare("INSERT INTO `hiring_partner_companies` (`company_name`) VALUES `:newCompanyName`;");
        $query->bindParam(':newCompanyName', $newCompanyName);
        return $query->execute();
    }

    public function getCompanySize($companySize, $companyId) {
        $query = $this->db->prepare("INSERT INTO `company_sizes` (`company_size`) VALUES :companySize WHERE `id` = :companyId; ");
        $query->bindParam(':companySize', $companySize);
        $query->bindParam(':companyId', $companyId);
        return $query->execute();
    }
}