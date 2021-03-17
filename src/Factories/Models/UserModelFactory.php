<?php

namespace Portal\Factories\Models;

use Portal\Models\UserModel;
use Psr\Container\ContainerInterface;

class UserModelFactory
{
    /**
     * Creates user model with dependencies.
     *
     * @param ContainerInterface $container
     *
     * @return UserModel returns object with db connection injected.
     */
    public function __invoke(ContainerInterface $container): UserModel
    {
        $db = $container->get('dbConnection');
        return new UserModel($db);
    }
}
