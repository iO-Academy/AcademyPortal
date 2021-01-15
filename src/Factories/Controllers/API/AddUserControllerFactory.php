<?php

namespace Portal\Factories\Controllers\API;

use Psr\Container\ContainerInterface;
use Portal\Controllers\API\AddUserController;

class AddUserControllerFactory
{
    /**
     * Creates AddUserController with dependencies.
     *
     * @param ContainerInterface $container
     *
     * @return AddUserController returns object with db connection injected.
     */
    public function __invoke(ContainerInterface $container): AddUserController
    {
        $userModel = $container->get('UserModel');
        return new AddUserController($userModel);
    }
}
