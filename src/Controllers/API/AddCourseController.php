<?php

namespace Portal\Controllers\API;

use Portal\Abstracts\Controller;
use Portal\Validators\DateTimeValidator;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Views\PhpRenderer;
use Portal\Models\CourseModel;
use Portal\Entities\CourseEntity;

class AddCourseController extends Controller
{
    private $courseModel;

    /**
     * AddCourseController constructor
     *
     * @param CourseModel $courseModel
     */
    public function __construct(CourseModel $courseModel)
    {
        $this->courseModel = $courseModel;
    }

    public function __invoke(Request $request, Response $response, array $args)
    {
        $newCourse = $request->getParsedBody();
        $responseData = [
            'success' => false,
            'message' => 'Unexpected Error.',
            'data' => []
        ];
        $statusCode = 400;

        try {
            $validDate = DateTimeValidator::validateStartEndTime($newCourse['startDate'], $newCourse['endDate']);
            $course = new CourseEntity(
                $newCourse['startDate'],
                $newCourse['endDate'],
                $newCourse['name'],
                $newCourse['trainer'],
                $newCourse['notes']
            );

            if (!empty($course) && $validDate) {
                $result = $this->courseModel->addCourse($course);
            }
        } catch (\Exception $exception) {
            $responseData['message'] = $exception->getMessage();
        }

        if (isset($result) && $result) {
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
