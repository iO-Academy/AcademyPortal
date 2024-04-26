<?php

namespace Portal\Controllers\API;

use Portal\Models\CourseModel;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class EditCourseController
{
    private CourseModel $courseModel;

    public function __construct(CourseModel $courseModel)
    {
        $this->courseModel = $courseModel;
    }

    public function __invoke(RequestInterface $request, ResponseInterface $response)
    {
        $courseData = $request->getParsedBody();
        $this->courseModel->updateCourse($courseData);
        return $response->withHeader('Location', '/courses')->withStatus(301);
    }
}
