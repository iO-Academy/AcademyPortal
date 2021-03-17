<?php

namespace Portal\Factories\Controllers\API;

use Portal\Controllers\API\AddCourseController;
use Psr\Container\ContainerInterface;

class AddCourseControllerFactory
{
    /**
     * Returns an instance of AddCourseController
     *
     * @param ContainerInterface $container
     * @return AddCourseController
     */
    public function __invoke(ContainerInterface $container): AddCourseController
    {
        $courseModel = $container->get('CourseModel');
        return new AddCourseController($courseModel);
    }
}
