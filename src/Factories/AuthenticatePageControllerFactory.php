<?php

namespace Portal\Factories;

use Portal\Controllers\FrontEnd\AuthenticatePageController;
use Psr\Container\ContainerInterface;

class AuthenticatePageControllerFactory
{
    public function __invoke(ContainerInterface $container) : AuthenticatePageController
    {
        $renderer = $container->get('renderer');
        return new AuthenticatePageController($renderer);
    }
}
