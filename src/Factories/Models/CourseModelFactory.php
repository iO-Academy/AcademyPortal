<?php

namespace Portal\Factories\Models;

use Portal\Models\CourseModel;
use Psr\Container\ContainerInterface;

class CourseModelFactory
{
    /**
     * Factory to generate an CourseModel
     *
     * @param ContainerInterface $container
     *
     * @return CourseModel
     */
    public function __invoke(ContainerInterface $container): CourseModel
    {
        $db = $container->get('dbConnection');
        return new CourseModel($db);
    }
}
