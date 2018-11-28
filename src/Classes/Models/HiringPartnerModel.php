<?php

namespace Portal\Models;



use Portal\Entities\HiringPartnerEntity;

class HiringPartnerModel
{
    private $db;

    /**
     * HiringPartnerModel constructor.
     * @param $db
     */
    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    public function insertNewHiringPartnerToDb(HiringPartnerEntity $hiringPartnerEntity) {

        $query = $this->db->prepare("
            INSERT INTO `hiringPartners` (`companyName`, `size`, `techStack`, `postcode`, `phoneNo`, `url`) 
            VALUES (:companyName, :size, :techStack, :postcode, :phoneNo, :url);");
        $query->bindParam(':companyName', $hiringPartnerEntity->getCompanyName());
        $query->bindParam(':size', $hiringPartnerEntity->getSize());
        $query->bindParam(':techStack', $hiringPartnerEntity->getTechStack());
        $query->bindParam(':postcode', $hiringPartnerEntity->getPostcode());
        $query->bindParam(':phoneNo', $hiringPartnerEntity->getPhoneNo());
        $query->bindParam(':url', $hiringPartnerEntity->getUrl());
        return $query->execute();
    }
}