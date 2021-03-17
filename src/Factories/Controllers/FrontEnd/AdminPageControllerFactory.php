<?php

namespace Portal\Factories\Controllers\FrontEnd;

use Psr\Container\ContainerInterface;
use Portal\Controllers\FrontEnd\AdminPageController;

class AdminPageControllerFactory
{
    /**
     * Creates a interface that will render.
     *
     * @param ContainerInterface $container
     *
     * @return AdminPageController that calls renderer.
     */

    public function __invoke(ContainerInterface $container): AdminPageController
    {
        $renderer = $container->get('renderer');
        return new AdminPageController($renderer);
    }
}
