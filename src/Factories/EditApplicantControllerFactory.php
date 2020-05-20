<?php


namespace Portal\Factories;


use Portal\Controllers\EditApplicantController;
use Psr\Container\ContainerInterface;

class EditApplicantControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $applicantModel = $container->get('ApplicantModel');
        $editApplicantController = new EditApplicantController($applicantModel);
        return $editApplicantController;
    }

}