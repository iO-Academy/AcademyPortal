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
        $query->bindParam(':companyName', $hiringPartnerEntity['companyName']);
        $query->bindParam(':size', $hiringPartnerEntity['size']);
        $query->bindParam(':techStack', $hiringPartnerEntity['techStack']);
        $query->bindParam(':postcode', $hiringPartnerEntity['postcode']);
        $query->bindParam(':phoneNo', $hiringPartnerEntity['phoneNo']);
        $query->bindParam(':url', $hiringPartnerEntity['url']);
        return $query->execute();
    }

}