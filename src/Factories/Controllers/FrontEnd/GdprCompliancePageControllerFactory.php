<?php

namespace Portal\Factories\Controllers\FrontEnd;

use Portal\Controllers\FrontEnd\GdprCompliancePageController;
use Psr\Container\ContainerInterface;

class GdprCompliancePageControllerFactory

{
    /**
     * Retreives ApplicantModel and PhpRenderer from DIC
     * Creates and returns new instance of GdprCompliancePageController
     *
     * @param ContainerInterface $container
     * @return GdprCompliancePageController
     */
    public function __invoke(ContainerInterface $container): GdprCompliancePageController
    {
        $eventModel = $container->get('ApplicantModel');
        $renderer = $container->get('renderer');
        return new GdprCompliancePageController($renderer, $eventModel);
    }

}