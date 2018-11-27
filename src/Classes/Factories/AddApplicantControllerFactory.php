<?php

namespace Portal\Factories;

use Psr\Container\ContainerInterface;
use Portal\Controllers\AddApplicantController;

class AddApplicantControllerFactory
{
    /**
     * Creates AddApplicantController with dependencies
     *
     * @param $container
     *
     * @return AddApplicantController returns object with db connection injected
     */
    public function __invoke(ContainerInterface $container): AddApplicantController
    {
        $renderer = $container->get('renderer');
        return new AddApplicantController($renderer);
    }
}
