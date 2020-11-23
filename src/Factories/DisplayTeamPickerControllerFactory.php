<?php

namespace Portal\Factories;

use Portal\Controllers\FrontEnd\DisplayTeamPickerController
use Psr\Container\ContainerInterface;

class DisplayTeamPickerControllerFactory
{
    /**
     * Retreives EventModel and PhpRenderer from DIC
     * Creates and returns new instance of DisplayEventsPageController
     *
     * @param ContainerInterface $container
     * @return DisplayTeamPickerController
     */
    public function __invoke(ContainerInterface $container) : DisplayTeamPickerController
    {
        $applicantModel = $container->get('ApplicantModel');
        $renderer = $container->get('renderer');
        return new DisplayTeamPickerController($renderer, $applicantModel);
    }
}
