<?php

namespace Portal\Factories;

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
        $courseModel = $container->get('CourseModel');
        $renderer = $container->get('renderer');
        return new DisplayCoursesController($renderer, $courseModel);
    }
}
