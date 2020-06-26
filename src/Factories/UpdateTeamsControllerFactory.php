<?php

namespace Portal\Factories;

use Psr\Container\ContainerInterface;
use Portal\Controllers\UpdateTeamsController;

class UpdateTeamsControllerFactory
{
    /**
     * Creates UpdateTeamsController with dependencies.
     *
     * @param ContainerInterface $container
     *
     * @return UpdateTeamsController returns object with db connection injected.
     */
    public function __invoke(ContainerInterface $container): UpdateTeamsController
    {
        $applicantModel = $container->get('ApplicantModel');
        $teamModel = $container->get('TeamModel');
        return new UpdateTeamsController($applicantModel, $teamModel);
    }
}
