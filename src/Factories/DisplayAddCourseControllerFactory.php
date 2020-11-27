<?php

namespace Portal\Factories;

use Portal\Controllers\FrontEnd\DisplayAddCourseController;
use Psr\Container\ContainerInterface;

class DisplayAddCourseControllerFactory
{
    /**
     * Retrieves CourseModel and PhpRenderer from DIC
     * Creates and returns new instance of DisplayAddCourseController
     *
     * @param ContainerInterface $container
     *
     * @return DisplayAddCourseController
     */
    public function __invoke(ContainerInterface $container): DisplayAddCourseController
    {
        $courseModel = $container->get('CourseModel');
        $renderer = $container->get('renderer');
        return new DisplayAddCourseController($renderer, $courseModel);
    }
}
