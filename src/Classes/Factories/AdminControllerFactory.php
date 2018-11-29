<?php

namespace Portal\Factories;

use Psr\Container\ContainerInterface;
use Portal\Controllers\AdminController;

class AdminControllerFactory
{
    /**
     * Creates a interface that will render.
     *
     * @param ContainerInterface $container
     *
     * @return AdminController that calls renderer.
     */

    public function __invoke(ContainerInterface $container) : AdminController {
        $renderer = $container->get('renderer');
        return new AdminController($renderer);
    }
}
