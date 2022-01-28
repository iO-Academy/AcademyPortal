<?php

namespace Portal\Factories\Controllers\FrontEnd;

use Portal\Controllers\FrontEnd\StudentApplicationFormPageController;
use Psr\Container\ContainerInterface;

class StudentApplicationFormPageControllerFactory
{
    /**
     * Instantiates a StudentApplicationFormPageController
     *
     * @param ContainerInterface $container
     * @return StudentApplicationFormPageController
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function __invoke(ContainerInterface $container): StudentApplicationFormPageController
    {
        $model = $container->get('ApplicationFormModel');
        $view = $container->get('renderer');
        return new StudentApplicationFormPageController($model, $view);
    }
}
