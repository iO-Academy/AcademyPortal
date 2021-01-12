<?php

namespace Portal\Factories\Controllers\API;

use Portal\Controllers\API\LoginController;
use Psr\Container\ContainerInterface;

class LoginControllerFactory
{
    /**
     * Creates login controller with dependencies.
     *
     * @param ContainerInterface $container DIC
     *
     * @return LoginController returns object with dependencies injected
     */

    public function __invoke(ContainerInterface $container): LoginController
    {
        $userModel = $container->get('UserModel');
        return new LoginController($userModel);
    }
}
