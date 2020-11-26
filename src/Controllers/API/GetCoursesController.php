<?php

namespace Portal\Controllers\API;

use Portal\Abstracts\Controller;
use Portal\Models\CourseModel;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class GetCoursesController extends Controller
{
    private $courseModel;

    /**
     * GetCoursesController constructor.
     *
     * @param CourseModel $courseModel
     */

    public function __construct(CourseModel $courseModel)
    {
        $this->courseModel = $courseModel;
    }

    /**
     * Calls a method to get all the Courses and send JSON back with the info
     *
     * @param Request $request HTTP request
     * @param Response $response HTTP response
     * @param array $args
     * @return Response returns JSON with hiring partner data
     */
    public function __invoke(Request $request, Response $response, array $args)
    {
        $data = [
            'success' => false,
            'message' => 'Something went wrong.',
            'data' => []
        ];
        $statusCode = 200;

        try {
            $data['data'] = $this->courseModel->getAllCourses();
            $data['message'] = 'No Courses scheduled';
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
