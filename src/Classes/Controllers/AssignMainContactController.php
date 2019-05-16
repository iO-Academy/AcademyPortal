<?php


namespace Portal\Controllers;


use Portal\Models\HiringPartnerContactsModel;
use Slim\Http\Request;
use Slim\Http\Response;

class AssignMainContactController
{
    public $contactsModel;

    public function __construct(HiringPartnerContactsModel $hiringPartnerContactsModel)
    {
        $this->contactsModel = $hiringPartnerContactsModel;
    }

    public function __invoke(Request $request, Response $response, array $args)
    {
        // TODO: Implement __invoke() method.
    }
}