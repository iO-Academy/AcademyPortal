<?php

namespace Portal\Entities;


class HiringPartnerEntity
{
    private $companyName;
    private $size;
    private $techStack;
    private $postcode;
    private $phoneNo;
    private $url;

    /**
     * HiringPartnerEntity constructor.
     * @param $companyName
     * @param $size
     * @param $techStack
     * @param $postcode
     * @param $phoneNo
     * @param $url
     */
    public function __construct($companyName, $size, $techStack, $postcode, $phoneNo, $url)
    {
        $this->companyName = $companyName;
        $this->size = $size;
        $this->techStack = $techStack;
        $this->postcode = $postcode;
        $this->phoneNo = $phoneNo;
        $this->url = $url;
    }


}