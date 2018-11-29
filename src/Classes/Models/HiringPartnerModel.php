<?php

namespace Portal\Models;


use Portal\Entities\HiringPartnerEntity;

class HiringPartnerModel
{
    private $db;


    /**
     * HiringPartnerModel constructor takes a PDO object and sets it to a private property.
     * @param \PDO $db
     */
    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    /**
     * This inserts a new hiring partner entry into the database.
     *
     * @param HiringPartnerEntity $hiringPartnerEntity is an object containing the validated
     * data of the new hiring partner.
     *
     * @return bool depending on the success of the insertion of the new entry.
     */
    public function insertNewHiringPartnerToDb(HiringPartnerEntity $hiringPartnerEntity)
    {

        $stmt = $this->db->prepare("
            INSERT INTO `hiringPartners` (`companyName`, `size`, `techStack`, `postcode`, `phoneNo`, `url`) 
            VALUES (:companyName, :size, :techStack, :postcode, :phoneNo, :url);");
        $stmt->bindParam(':companyName', $hiringPartnerEntity->getCompanyName());
        $stmt->bindParam(':size', $hiringPartnerEntity->getSize());
        $stmt->bindParam(':techStack', $hiringPartnerEntity->getTechStack());
        $stmt->bindParam(':postcode', $hiringPartnerEntity->getPostcode());
        $stmt->bindParam(':phoneNo', $hiringPartnerEntity->getPhoneNo());
        $stmt->bindParam(':url', $hiringPartnerEntity->getUrl());
        return $stmt->execute();
    }

    public function getCompanySizeBracketIds()
    {
        $stmt = $this->db->query("SELECT `id` FROM `companySizeLink`;");
        return $stmt->fetchAll();
    }
}