<?php


namespace Portal\Factories;

use Portal\Controllers\EditApplicantController;
use Psr\Container\ContainerInterface;

class EditApplicantControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $renderer = $container->get('renderer');
        $applicantModel = $container->get('ApplicantModel');
        $editApplicantController = new EditApplicantController($applicantModel, $renderer);
        return $editApplicantController;
    }
}
