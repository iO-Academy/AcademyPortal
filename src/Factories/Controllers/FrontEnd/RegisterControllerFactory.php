<?php

namespace Portal\Factories\Controllers\FrontEnd;

use Psr\Container\ContainerInterface;
use Portal\Controllers\FrontEnd\RegisterController;

class RegisterControllerFactory
{
    public function __invoke(ContainerInterface $container) : RegisterController
    {
        $renderer = $container->get('renderer');
        $password = $container->get('RandomPasswordModel');
        return new RegisterController($renderer, $password);
    }
}
