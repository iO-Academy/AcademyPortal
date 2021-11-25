<?php

namespace Portal\Factories\Controllers\FrontEnd;

use Portal\Controllers\FrontEnd\StudentApplicationSuccessPageController;
use Psr\Container\ContainerInterface;

class StudentApplicationSuccessPageControllerFactory
{
    /**
     * Instantiates a StudentApplicationFormPageController
     *
     * @param ContainerInterface $container
     * @return StudentApplicationSuccessPageController
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function __invoke(ContainerInterface $container): StudentApplicationSuccessPageController
    {
        $model = $container->get('ApplicationFormModel');
        $view = $container->get('renderer');
        return new StudentApplicationSuccessPageController($model, $view);
    }
}
