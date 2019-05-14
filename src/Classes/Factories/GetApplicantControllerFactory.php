<?php
/**
 * Created by PhpStorm.
 * User: academy
 * Date: 2019-05-13
 * Time: 15:45
 */

namespace Portal\Factories;


use Portal\Controllers\GetApplicantController;

use Psr\Container\ContainerInterface;


class GetApplicantControllerFactory
{
    /**
     * Instantiates GetApplicantController with dependencies.
     *
     * @param ContainerInterface $container
     *
     * @return DisplayApplicantsController.
     */
    public function __invoke(ContainerInterface $container) : GetApplicantController
    {
        $renderer = $container->get('renderer');
        $applicantModel = $container->get('ApplicantModel');
        return new GetApplicantController($renderer, $applicantModel);
    }
}