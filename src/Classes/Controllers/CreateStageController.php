<?php

namespace Portal\Controllers;

use Portal\Models\StageModel;
use Portal\Entities\StageEntity;
use Slim\Http\Request;
use Slim\Http\Response;

class CreateStageController
{
    private $stageModel;

    /** Constructor assigns StageModel to this object
     *
     * CreateStageController constructor.
     * @param StageModel $stageModel
     */
    public function __construct(StageModel $stageModel)
    {
        $this->stageModel = $stageModel;
    }

    public function __invoke(Request $request, Response $response, array $args)
    {
        $requestData = $request->getParsedBody();
        $data = [
            'success' => false,
            'message' => 'Error!',
            'data' => []
        ];
        $statusCode = 500;


        if (isset($requestData['title'])) {
            $highestOrder = $this->stageModel->getHighestOrderNo();

        }

//        $newStage = new StageEntity($title, $order);
//
//        try {
//            $stage = $this->stageEn->createNewHiringPartner(
//                $newHiringPartner['name'],
//                $newHiringPartner['companySize'],
//                $newHiringPartner['techStack'],
//                $newHiringPartner['postcode'],
//                $newHiringPartner['phoneNumber'],
//                $newHiringPartner['companyUrl']
//            );
//            if (!empty($hiringPartner) && $hiringPartner instanceof HiringPartnerEntity) {
//                $result = $this->hiringPartnerModel->addHiringPartner($hiringPartner);
//            }
//        } catch (\Exception $exception) {
//            $data['message'] = $exception->getMessage();
//        }
//
//        if (isset($result) && $result) {
//            $data = [
//                'success' => true,
//                'message' => 'Hiring Partner Added to the db',
//                'data' => []
//            ];
//            $statusCode = 200;
//        }
//        return $response->withJson($data, $statusCode);
    }
}