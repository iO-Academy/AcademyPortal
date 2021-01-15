<?php

namespace Portal\Factories\Models;

use Psr\Container\ContainerInterface;
use Portal\Models\ApplicantModel;

class ApplicantModelFactory
{
    /**
     * Creates applicant model with dependencies.
     *
     * @param ContainerInterface $container
     *
     * @return ApplicantModel returns object with db connection injected.
     */
    public function __invoke(ContainerInterface $container)
    {
        $db = $container->get('dbConnection');
        return new ApplicantModel($db);
    }
}
