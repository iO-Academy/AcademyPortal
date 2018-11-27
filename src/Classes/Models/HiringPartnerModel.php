<?php

namespace Portal\Models;



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

    public function insertNewHiringPartnerToDb() { //need to pass in correct data from controller here
        $query = $this->db->prepare("INSERT INTO `hiringPartners` (`companyName`, `size`, `techStack`, `postcode`, `phoneNo`, `url`) VALUES (:companyName, :size, :techStack, :postcode, :phoneNo, :url);");
        $query->bindParam(':companyName', $companyName);
        $query->bindParam(':size', $size);
        $query->bindParam(':techStack', $techStack);
        $query->bindParam(':postcode', $postcode);
        $query->bindParam(':phoneNo', $phoneNo);
        $query->bindParam(':url', $url);
        return $query->execute();
    }

}