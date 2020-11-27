<?php

namespace Portal\Factories;

use Portal\Controllers\FrontEnd\DisplayStudentProfileController;
use Psr\Container\ContainerInterface;

class DisplayStudentProfileControllerFactory
{
    /**
     * Instantiates DisplayApplicantsController with dependencies.
     *
     * @param ContainerInterface $container
     *
     * @return DisplayStudentProfileController.
     */
    public function __invoke(ContainerInterface $container) : DisplayStudentProfileController
    {
        $renderer = $container->get('renderer');
        $applicantModel = $container->get('ApplicantModel');
        return new DisplayStudentProfileController($renderer, $applicantModel);
    }
}
