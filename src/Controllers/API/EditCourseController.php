<?php

namespace Portal\Controllers\API;

use Portal\Abstracts\Controller;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as RequestInterface;
use Portal\Models\CourseModel;

class EditCourseController extends Controller
{
    private CourseModel $courseModel;

    public function __construct(CourseModel $courseModel)
    {
        $this->courseModel = $courseModel;
    }

    public function __invoke(RequestInterface $request, Response $response, array $args): Response
    {
        $updatedCourse = $request->getParsedBody();

        $responseData = [
            'success' => false,
            'message' => 'Unexpected Error.',
            'data' => []
        ];
        $statusCode = 400;

        try {
            $this->courseModel->updateCourse($updatedCourse);
            $responseData = [
                'success' => true,
                'message' => 'New Course successfully saved.',
                'data' => []
            ];
            $statusCode = 200;
        } catch (\Exception $exception) {
            $responseData['message'] = $exception->getMessage();
        }

        return $this->respondWithJson($response, $responseData, $statusCode);
    }
}
