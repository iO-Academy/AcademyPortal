<?php

namespace Portal\Factories;

use Psr\Container\ContainerInterface;
use Portal\Controllers\DisplayHiringPartnerPageController;

class DisplayHiringPartnerPageControllerFactory
{
 public function __invoke(ContainerInterface $container) : DisplayHiringPartnerPageController
 {
     $renderer = $container->get('renderer');
     return new DisplayHiringPartnerPageController($renderer);
 }
}