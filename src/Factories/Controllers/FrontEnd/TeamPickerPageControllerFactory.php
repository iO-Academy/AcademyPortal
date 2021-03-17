<?php

namespace Portal\Factories\Controllers\FrontEnd;

use Portal\Controllers\FrontEnd\TeamPickerPageController;
use Psr\Container\ContainerInterface;

class TeamPickerPageControllerFactory
{
    /**
     * Retreives EventModel and PhpRenderer from DIC
     * Creates and returns new instance of EventsPageController
     *
     * @param ContainerInterface $container
     * @return TeamPickerPageController
     */
    public function __invoke(ContainerInterface $container): TeamPickerPageController
    {
        $applicantModel = $container->get('ApplicantModel');
        $renderer = $container->get('renderer');
        return new TeamPickerPageController($renderer, $applicantModel);
    }
}
