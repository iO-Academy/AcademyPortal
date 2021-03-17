<?php

/**
 * Created by PhpStorm.
 * User: academy
 * Date: 17/05/2018
 * Time: 10:30
 */

namespace Portal\Factories\Controllers\FrontEnd;

use Psr\Container\ContainerInterface;
use Portal\Controllers\FrontEnd\HomePageController;

class HomePageControllerFactory
{
    public function __invoke(ContainerInterface $container): HomePageController
    {
        $renderer = $container->get('renderer');
        return new HomePageController($renderer);
    }
}
