<?php

namespace Portal\Factories;

use Psr\Container\ContainerInterface;
use Portal\Controllers\AdminController;

class AdminControllerFactory
{
    public function __invoke(ContainerInterface $container) : AdminController {
        $renderer = $container->get('renderer');
        return new AdminController($renderer);
    }
}

// create RegisterUserControllerFactory
    // (needed even if no dependencies in case there are in future)