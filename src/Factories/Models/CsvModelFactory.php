<?php

namespace Portal\Factories\Models;

use Psr\Container\ContainerInterface;
use Portal\Models\CsvModel;

class CsvModelFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $db = $container->get('dbConnection');
        return new CsvModel($db);
    }
}