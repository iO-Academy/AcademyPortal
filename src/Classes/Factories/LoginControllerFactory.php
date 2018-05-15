<?php
/**
 * Created by PhpStorm.
 * User: academy
 * Date: 15/05/2018
 * Time: 10:24
 */

namespace Portal\Factories;
use Portal\Controllers\LoginController;
use Portal\Models\UserModel;
use Psr\Container\ContainerInterface;


class LoginControllerFactory
{
    /**
     * @param ContainerInterface $container DIC
     *
     * @return LoginController returns object with dependencies injected
     */
    public function __invoke(ContainerInterface $container)
    {
        $userModel = $container->get(UserModel::class);
        return new LoginController($userModel);
    }

}