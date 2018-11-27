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
        $success = preg_match($postcodeRegex, 'BA115EY');
        var_dump($success);

//        $companyName = $newHiringPartnerData['companyName'];
//        $size = $newHiringPartnerData['size'];
//        $techStack = $newHiringPartnerData['techStack'];
//        $postcode = $newHiringPartnerData['postcode'];
//        $phoneNo = $newHiringPartnerData['phoneNo'];
//        $url = $newHiringPartnerData['url'];
//
//        if (
//            !empty($companyName) &&
//            is_string($companyName) &&
//            !empty($size) &&
//            is_int($size) &&
//            !empty($techStack) &&
//            is_string($techStack) &&
//            !empty($postcode) // need to add validation for phoneNo and url here
//        ) {
//            $validatedHiringPartnerData = [
//                'companyName' => $companyName,
//                'size' => $size,
//                'techStack' => $techStack,
//
//                'phoneNo' => $phoneNo,
//                'url' => filter_var($url, FILTER_SANITIZE_URL)
//            ];
//        }

//        $this->hiringPartnerModel->insertNewHiringPartnerToDb();
    }
}