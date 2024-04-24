<?php

namespace Portal\Controllers\API;

use Portal\Abstracts\Controller;
use Portal\Models\CourseModel;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class GetDeleteCourseInfoController extends Controller
{
    private CourseModel $courseModel;

    public function __construct(CourseModel $courseModel)
    {
        $this->courseModel = $courseModel;
    }
    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $data = [
        'success' => false,
        'message' => 'Something went wrong.',
        'data' => []
    ];
        $statusCode = 200;

        try {
            $data['data'] = $this->courseModel->getApplicantsByCourse($args['id']);
            $data['message'] = 'There are no applicants on this course';
            $data['success'] = true;

            if (count($data['data']) > 0) {
                $data['message'] = '';
            }
        } catch (\PDOException $exception) {
            $data['message'] = $exception->getMessage();
        }
        return $this->respondWithJson($response, $data, $statusCode);
    }


}