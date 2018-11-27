<?php

namespace Portal\Factories;

use Psr\Container\ContainerInterface;
use Portal\Models\ApplicantModel;

class ApplicantModelFactory
{
    /**
     * Creates applicant model with dependencies
     *
     * @param $container
     *
     * @return ApplicantModel returns object with db connection injected
     * @throws
     */
    public function __invoke(ContainerInterface $container)
    {
        $db = $container->get('dbConnection');
        return new ApplicantModel($db);
    }
}
