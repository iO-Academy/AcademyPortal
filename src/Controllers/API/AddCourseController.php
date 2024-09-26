<?php

namespace Portal\Controllers\API;

use Portal\Abstracts\Controller;
use Portal\Sanitisers\CourseSanitiser;
use Portal\Validators\CourseValidator;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Portal\Models\CourseModel;
use Slim\Views\PhpRenderer;

class AddCourseController extends Controller
{
    private CourseModel $courseModel;

    public function __construct(CourseModel $courseModel)
    {
        $this->courseModel = $courseModel;
    }

    /**
     * Get user input and send to CourseModel to add to db.
     */
    public function __invoke(Request $request, Response $response, array $args): Response
    {

        $newCourse = $request->getParsedBody();

        $responseData = [
            'success' => false,
            'message' => 'Unexpected Error.',
            'data' => []
        ];
        $statusCode = 400;

        try {
        if (CourseValidator::validate($newCourse)) {
            $newCourse = CourseSanitiser::sanitise($newCourse);
                $insertedId = $this->courseModel->addCourse($newCourse);
                $this->courseModel->addTrainersToCourse($newCourse['trainer'], $insertedId);
            }
        } catch (\Exception $exception) {
            $responseData['message'] = $exception->getMessage();
        }

        if (isset($insertedId) && $insertedId) {
            $responseData = [
                'success' => true,
                'message' => 'New Course successfully saved.',
                'data' => []
            ];
            $statusCode = 200;
        }

        return $this->respondWithJson($response, $responseData, $statusCode);

    }
}