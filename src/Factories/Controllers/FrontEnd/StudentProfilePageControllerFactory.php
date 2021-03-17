<?php

namespace Portal\Factories\Controllers\FrontEnd;

use Portal\Controllers\FrontEnd\StudentProfilePageController;
use Psr\Container\ContainerInterface;

class StudentProfilePageControllerFactory
{
    /**
     * Instantiates ApplicantsPageController with dependencies.
     *
     * @param ContainerInterface $container
     *
     * @return StudentProfilePageController.
     */
    public function __invoke(ContainerInterface $container): StudentProfilePageController
    {
        $renderer = $container->get('renderer');
        $applicantModel = $container->get('ApplicantModel');
        return new StudentProfilePageController($renderer, $applicantModel);
    }
}
