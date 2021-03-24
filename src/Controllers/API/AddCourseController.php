<?php

namespace Portal\Controllers\API;

use Portal\Abstracts\Controller;
use Portal\Sanitisers\CourseSanitiser;
use Portal\Validators\CourseValidator;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Portal\Models\CourseModel;

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
                $result = $this->courseModel->addCourse($newCourse);
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
