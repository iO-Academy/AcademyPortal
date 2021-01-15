<?php

namespace Portal\Factories\Controllers\FrontEnd;

use Psr\Container\ContainerInterface;
use Portal\Controllers\FrontEnd\AddApplicantPageController;

class AddApplicantPageControllerFactory
{
    /**
     * Creates AddApplicantPageController with dependencies.
     *
     * @param ContainerInterface $container
     *
     * @return AddApplicantPageController returns object with db connection injected.
     */
    public function __invoke(ContainerInterface $container): AddApplicantPageController
    {
        $renderer = $container->get('renderer');
        return new AddApplicantPageController($renderer);
    }
}
