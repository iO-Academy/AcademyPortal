<?php

namespace Portal\Factories;

use Portal\Models\UserModel;
use Psr\Container\ContainerInterface;

class UserModelFactory
{
    /**
     * @param $container
     *
     * @return UserModel returns object with db connection injected
     */
    public function __invoke(ContainerInterface $container)
    {
        $db = $container->get('dbConnection');
        return new UserModel($db);
    }
}