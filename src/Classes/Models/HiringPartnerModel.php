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