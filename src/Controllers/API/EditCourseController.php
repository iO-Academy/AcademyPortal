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
        $datum = $request->getParsedBody();
        $this->courseModel->updateCourse($datum);
        return $response->withHeader('Location', '/courses')->withStatus(301);
    }
}
