<?php

namespace Portal\Factories\Controllers\API;

use Psr\Container\ContainerInterface;
use Portal\Controllers\API\EditTeamsController;

class EditTeamsControllerFactory
{
    /**
     * Creates EditTeamsController with dependencies.
     *
     * @param ContainerInterface $container
     *
     * @return EditTeamsController returns object with db connection injected.
     */
    public function __invoke(ContainerInterface $container): EditTeamsController
    {
        $applicantModel = $container->get('ApplicantModel');
        $teamModel = $container->get('TeamModel');
        return new EditTeamsController($applicantModel, $teamModel);
    }
}
