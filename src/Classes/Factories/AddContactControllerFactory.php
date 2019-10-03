<?php


namespace Portal\Factories;


use Portal\Controllers\AddContactController;
use Psr\Container\ContainerInterface;

class AddContactControllerFactory
{
    public function __invoke(ContainerInterface $container):AddContactController
    {
        $hiringPartnerModel = $container->get('HiringPartnerModel');
        return new AddContactController($hiringPartnerModel);
    }

}