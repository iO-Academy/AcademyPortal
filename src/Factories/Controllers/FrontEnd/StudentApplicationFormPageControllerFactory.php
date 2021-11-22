<?php

namespace Portal\Factories\Controllers\FrontEnd;

use Portal\Controllers\FrontEnd\StudentApplicationFormPageController;
use Psr\Container\ContainerInterface;

class StudentApplicationFormPageControllerFactory
{
    public function __invoke(ContainerInterface $container) : StudentApplicationFormPageController
    {
        $model = $container->get('ApplicationFormModel');
        $view = $container->get('renderer');
        return new StudentApplicationFormPageController($model, $view);
    }
}