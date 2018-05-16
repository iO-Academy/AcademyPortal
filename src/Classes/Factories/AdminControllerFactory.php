<?php

namespace Portal\Factory;

use Psr\Container\ContainerInterface;
use Portal\Controller\AdminController;

class AdminControllerFactory
{
    public function __invoke(ContainerInterface $container) : AdminController {
        $renderer = $container->get('renderer');
        return new AdminController($renderer);
    }
}