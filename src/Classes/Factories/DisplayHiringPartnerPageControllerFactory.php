<?php

namespace Portal\Factories;

use Portal\Models\HiringPartnerModel;
use Psr\Container\ContainerInterface;
use Portal\Controllers\DisplayHiringPartnerPageController;

class DisplayHiringPartnerPageControllerFactory
{
 public function __invoke(ContainerInterface $container) : DisplayHiringPartnerPageController
 {
     $renderer = $container->get('renderer');
     $hiringPartnerModel = $container->get('HiringPartnerModel');
     return new DisplayHiringPartnerPageController($renderer, $hiringPartnerModel);
 }
}