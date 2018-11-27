<?php

namespace Portal\Controllers;


use Portal\Models\HiringPartnerModel;
use Slim\Http\Request;
use Slim\Http\Response;

class AddHiringPartnerController
{
    private $hiringPartnerModel;

    /**
     * AddHiringPartnerController constructor instantiates the AddHiringPartnerController
     * @param $hiringPartnerModel
     */
    public function __construct(HiringPartnerModel $hiringPartnerModel)
    {
        $this->hiringPartnerModel = $hiringPartnerModel;
    }

    public function __invoke(Request $request, Response $response)
    {
        $newHiringPartnerData = $request->getParsedBody();

        $postcodeRegex = '#^([Gg][Ii][Rr] 0[Aa]{2})|((([A-Za-z][0-9]{1,2})|(([A-Za-z][A-Ha-hJ-Yj-y][0-9]{1,2})|(([A-Za-z][0-9][A-Za-z])|([A-Za-z][A-Ha-hJ-Yj-y][0-9][A-Za-z]?))))\s?[0-9][A-Za-z]{2})$#';

        $companyName = $newHiringPartnerData['companyName'];
        $size = $newHiringPartnerData['size'];
        $techStack = $newHiringPartnerData['techStack'];
        $postcode = $newHiringPartnerData['postcode'];
        $phoneNo = $newHiringPartnerData['phoneNo'] ?? 'not known'; //null coalesce
        $url = $newHiringPartnerData['url'];

        if (
            !empty($companyName) &&
            is_string($companyName) &&
            !empty($size) &&
            is_int($size) &&
            !empty($techStack) &&
            is_string($techStack) &&
            !empty($postcode) &&
            preg_match($postcodeRegex, $postcode) // need to add validation for phoneNo and url here
        ) {
            $validatedNewHiringPartnerData = [
                'companyName' => $companyName,
                'size' => $size,
                'techStack' => $techStack,
                'postcode' => $postcode,
                'phoneNo' => filter_var($phoneNo, FILTER_SANITIZE_STRING), //need to validate this
                'url' => filter_var($url, FILTER_SANITIZE_URL)
            ];

            $successfulNewHiringPartner = $this->hiringPartnerModel->insertNewHiringPartnerToDb(
                $validatedNewHiringPartnerData['companyName'],
                $validatedNewHiringPartnerData['size'],
                $validatedNewHiringPartnerData['techStack'],
                $validatedNewHiringPartnerData['postcode'],
                $validatedNewHiringPartnerData['phoneNo'],
                $validatedNewHiringPartnerData['url']
                );
        }
    }
}