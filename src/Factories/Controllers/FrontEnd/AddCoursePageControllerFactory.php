<?php

namespace Portal\Factories\Controllers\FrontEnd;

use Portal\Controllers\FrontEnd\AddCoursePageController;
use Psr\Container\ContainerInterface;

class AddCoursePageControllerFactory
{
    /**
     * Retrieves CourseModel and PhpRenderer from DIC
     * Creates and returns new instance of AddCoursePageController
     *
     * @param ContainerInterface $container
     *
     * @return AddCoursePageController
     */
    public function __invoke(ContainerInterface $container): AddCoursePageController
    {
        $courseModel = $container->get('CourseModel');
        $renderer = $container->get('renderer');
        return new AddCoursePageController($renderer, $courseModel);
    }
}
