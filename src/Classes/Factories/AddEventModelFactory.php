<?php
/**
 * Created by PhpStorm.
 * User: academy
 * Date: 27/11/2018
 * Time: 10:18
 */

namespace Portal\Factories;


use Portal\Models\AddEventModel;

class AddEventModelFactory
{
    /**
     * Creates AddEventModel with dependencies
     *
     * @param ContainerInterface $container
     *
     * @return AddEventModel
     */
    public function __invoke(ContainerInterface $container) : AddEventModel
    {
        $db = $container->get('dbConnection');
        return new AddEventModel($db);
    }

}