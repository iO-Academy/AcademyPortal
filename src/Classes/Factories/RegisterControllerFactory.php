<?php

namespace Portal\Factories;

use Psr\Container\ContainerInterface;
use Portal\Controllers\RegisterController;

class RegisterControllerFactory
{
    public function __invoke(ContainerInterface $container) : RegisterController {
        $renderer = $container->get('renderer');
        return new RegisterController($renderer);
    }
}