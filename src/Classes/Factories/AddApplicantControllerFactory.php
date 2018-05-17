<?php
/**
 * Created by PhpStorm.
 * User: academy
 * Date: 15/05/2018
 * Time: 16:34
 */

namespace Portal\Factories;
use Psr\Container\ContainerInterface;
use Portal\Controllers\AddApplicantController;


class AddApplicantControllerFactory
{
    /**
     * Creates RegisterUserController with dependencies
     *
     * @param $container
     *
     * @return AddApplicantController returns object with db connection injected
     */
    public function __invoke(ContainerInterface $container): AddApplicantController
    {
        $renderer = $container->get('renderer');
        return new AddApplicantController($renderer);
    }
}