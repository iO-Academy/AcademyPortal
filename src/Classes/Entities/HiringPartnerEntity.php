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
    private $postcodeRegex = '#^([Gg][Ii][Rr] 0[Aa]{2})|((([A-Za-z][0-9]{1,2})|(([A-Za-z][A-Ha-hJ-Yj-y][0-9]{1,2})|(([A-Za-z][0-9][A-Za-z])|([A-Za-z][A-Ha-hJ-Yj-y][0-9][A-Za-z]?))))\s?[0-9][A-Za-z]{2})$#';

    /**
     * HiringPartnerEntity constructor.
     * @param $companyName
     * @param $size
     * @param $techStack
     * @param $postcode
     * @param $phoneNo
     * @param $url
     */
    public function __construct(string $companyName, int $size, string $techStack, string $postcode, string $phoneNo = '0', string $url = '0')
    {
        if (preg_match($this->postcodeRegex, $postcode)) {

            $companyName = filter_var($companyName, FILTER_SANITIZE_STRING);
            $size = filter_var($size, FILTER_SANITIZE_NUMBER_INT);
            $techStack = filter_var($techStack, FILTER_SANITIZE_STRING);
            $phoneNo = filter_var($phoneNo, FILTER_SANITIZE_STRING);
            $url = filter_var($url, FILTER_SANITIZE_URL);

            $this->companyName = $companyName;
            $this->size = $size;
            $this->techStack = $techStack;
            $this->postcode = $postcode;
            $this->phoneNo = $phoneNo;
            $this->url = $url;
        }
    }

    /**
     * @return string
     */
    public function getCompanyName(): string
    {
        return $this->companyName;
    }

    /**
     * @return int
     */
    public function getSize(): int
    {
        return $this->size;
    }

    /**
     * @return string
     */
    public function getTechStack(): string
    {
        return $this->techStack;
    }

    /**
     * @return mixed
     */
    public function getPostcode(): string
    {
        return $this->postcode;
    }

    /**
     * @return mixed
     */
    public function getPhoneNo(): string
    {
        return $this->phoneNo;
    }

    /**
     * @return mixed
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return string
     */
    public function getPostcodeRegex(): string
    {
        return $this->postcodeRegex;
    }
}
