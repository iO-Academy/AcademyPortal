<?php


namespace Portal\Controllers;

class AddContactController
{

    private $hiringPartnerModel;

    /**
     * AddContactController constructor.
     * @param $hiringPartnerModel
     */
    public function __construct($hiringPartnerModel)
    {
        $this->hiringPartnerModel = $hiringPartnerModel;
    }
}
