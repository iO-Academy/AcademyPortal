<?php

namespace Portal\Controllers\API;

use Portal\Models\ApplicantModel;
use Portal\Models\CourseModel;
use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Portal\Abstracts\Controller;

class DeleteCourseController extends Controller
{
    private CourseModel $courseModel;

    public function __construct(ApplicantModel $applicantModel, CourseModel $courseModel)
    {
        $this->courseModel = $courseModel;
    }

    public function __invoke(Request $request, Response $response, array $args): Response
    {

        $students = $request->getParsedBody();
        $courseToDelete = $args['id'];
        foreach ($students as $studentId => $value) {
            $this->courseModel->reassignApplicantsToNewCourse(intval($value), intval($studentId));
        }
        $this->courseModel->deleteCourse($courseToDelete);
        return $response->withHeader('Location', '/courses')->withStatus(301);
    }
}