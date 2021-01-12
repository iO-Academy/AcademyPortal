<?php

namespace Portal\Factories\Controllers\API;

use Portal\Controllers\API\GetCoursesController;
use Psr\Container\ContainerInterface;

class GetCoursesControllerFactory
{
    /**
     * Creates a controller to get all the courses
     *
     * @param ContainerInterface $container
     *
     * @return GetCoursesController a new instance of the GetCoursesController
     */
    public function __invoke(ContainerInterface $container)
    {
        $courseModel = $container->get('CourseModel');
        return new GetCoursesController($courseModel);
    }
}
