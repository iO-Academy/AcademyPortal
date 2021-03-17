<?php

namespace Portal\Factories\Controllers\FrontEnd;

use Psr\Container\ContainerInterface;
use Portal\Controllers\FrontEnd\RegisterPageController;

class RegisterPageControllerFactory
{
    public function __invoke(ContainerInterface $container): RegisterPageController
    {
        $renderer = $container->get('renderer');
        $password = $container->get('RandomPasswordModel');
        return new RegisterPageController($renderer, $password);
    }
}
