<?php

namespace Portal\Controllers\API;

use Composer\DependencyResolver\Request;
use Portal\Abstracts\Controller;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as RequestInterface;

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
            $this->courseModel->updateCourse($updatedCourse['id']);
            $responseData = [
                'success' => true,
                'message' => 'New Course successfully saved.',
                'data' => []
            ];
            $statusCode = 200;
        return $this->respondWithJson($response, $responseData, $statusCode);
    }

}