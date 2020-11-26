<?php

namespace Portal\Controllers\API;

use Portal\Abstracts\Controller;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
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

    /**
     * Get user input and send to CourseModel to add to db.
     *
     * @param Request  $request
     * @param Response $response
     * @param array    $args
     *
     * @return Response
     */
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
            $course = new CourseEntity(
                $newCourse['startDate'],
                $newCourse['endDate'],
                $newCourse['name'],
                $newCourse['trainer'],
                $newCourse['notes']
            );

            if (!empty($course)) {
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
