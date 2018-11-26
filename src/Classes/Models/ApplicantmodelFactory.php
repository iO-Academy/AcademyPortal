<?php


namespace Portal\Models;

use Psr\Container\ContainerInterface;

class ApplicantmodelFactory
{
    public function __invoke(containerInterface $container)
    {
        $db = $container->get('dcConnection');
        return new ApplicantModel($db);
    }
}