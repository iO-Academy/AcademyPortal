<?php
/**
 * Created by PhpStorm.
 * User: academy
 * Date: 15/05/2018
 * Time: 16:34
 */

namespace Portal\Factory;


class RegisterUserControllerFactory
{
    /**
     * Creates RegisterUserController with dependencies
     *
     * @param $container
     *
     * @return RegisterUserController returns object with db connection injected
     */
    public function __invoke(ContainerInterface $container): RegisterUserController
    {
        $db = $container->get('dbConnection');
        return new RegisterUserController($db);
    }

}