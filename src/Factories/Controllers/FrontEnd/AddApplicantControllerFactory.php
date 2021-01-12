<?php

namespace Portal\Factories\Controllers\FrontEnd;

use Psr\Container\ContainerInterface;
use Portal\Controllers\FrontEnd\AddApplicantController;

class AddApplicantControllerFactory
{
    /**
     * Creates AddApplicantController with dependencies.
     *
     * @param ContainerInterface $container
     *
     * @return AddApplicantController returns object with db connection injected.
     */
    public function __invoke(ContainerInterface $container): AddApplicantController
    {
        $renderer = $container->get('renderer');
        return new AddApplicantController($renderer);
    }
}
