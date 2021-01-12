<?php

namespace Portal\Factories\Controllers\FrontEnd;

use Portal\Controllers\FrontEnd\DisplayCoursesController;
use Psr\Container\ContainerInterface;

class DisplayCoursesControllerFactory
{
    /**
     * Retreives CourseModel and PhpRenderer from DIC
     * Creates and returns new instance of DisplayCoursesController
     *
     * @param ContainerInterface $container
     * @return DisplayCoursesController
     */
    public function __invoke(ContainerInterface $container) : DisplayCoursesController
    {
        $renderer = $container->get('renderer');
        $courseModel = $container->get('CourseModel');
        return new DisplayCoursesController($renderer, $courseModel);
    }
}
