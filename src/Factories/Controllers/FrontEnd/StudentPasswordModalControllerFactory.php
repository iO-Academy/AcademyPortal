<?php

namespace Portal\Factories\Controllers\FrontEnd;

use Psr\Container\ContainerInterface;
use Portal\Controllers\FrontEnd\StudentPasswordModalController;

class StudentPasswordModalControllerFactory
{
    public function __invoke(ContainerInterface $container): StudentPasswordModalController
    {
        $renderer = $container->get('renderer');
        $password = $container->get('RandomPasswordModel');
        return new StudentPasswordModalController($renderer, $password);
    }
}