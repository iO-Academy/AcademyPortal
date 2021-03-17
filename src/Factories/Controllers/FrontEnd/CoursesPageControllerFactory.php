<?php

namespace Portal\Factories\Controllers\FrontEnd;

use Portal\Controllers\FrontEnd\CoursesPageController;
use Psr\Container\ContainerInterface;

class CoursesPageControllerFactory
{
    /**
     * Retreives CourseModel and PhpRenderer from DIC
     * Creates and returns new instance of CoursesPageController
     *
     * @param ContainerInterface $container
     * @return CoursesPageController
     */
    public function __invoke(ContainerInterface $container): CoursesPageController
    {
        $renderer = $container->get('renderer');
        $courseModel = $container->get('CourseModel');
        return new CoursesPageController($renderer, $courseModel);
    }
}
