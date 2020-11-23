<?php


namespace Portal\Factories;

use Portal\Controllers\API\DisplayEditApplicantController;
use Psr\Container\ContainerInterface;

class DisplayEditApplicantControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $renderer = $container->get('renderer');
        $applicantModel = $container->get('ApplicantModel');
        $editApplicantController = new DisplayEditApplicantController($applicantModel, $renderer);
        return $editApplicantController;
    }
}
