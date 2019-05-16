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
        $newMainContact = $request->getParsedBody();

        $data = [
            'success' => false,
            'message' => 'Unable to set new main contact!',
            'data' => []
        ];
        $statusCode = 400;

        try {
            $result = $this->contactsModel->makeHiringPartnerContactMain($newMainContact['contactId'], $newMainContact['companyId']);
        } catch (\Exception $exception) {
            $data['message'] = $exception->getMessage();
        }

        if (isset($result) && $result) {
            $data = [
                'success' => true,
                'message' => 'new main contact set!',
                'data' => []
            ];
            $statusCode = 200;
        }

        return $response->withJson($data, $statusCode);
    }
}