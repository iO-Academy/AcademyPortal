<?php

namespace Portal\Factory;

use Psr\Container\ContainerInterface;
use Portal\Controller\RegisterUserController;

class RegisterUserControllerFactory
{
    /**
     * Creates RegisterUserController with dependencies.
     *
     * @param ContainerInterface $container
     *
     * @return RegisterUserController returns object with db connection injected.
     */
    public function __invoke(ContainerInterface $container): RegisterUserController
    {
        $userModel = $container->get('UserModel');
        return new RegisterUserController($userModel);
    }
}
