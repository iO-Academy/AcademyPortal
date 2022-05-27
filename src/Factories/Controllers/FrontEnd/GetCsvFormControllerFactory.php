<?php

namespace Portal\Factories\Controllers\FrontEnd;

use Portal\Controllers\FrontEnd\GetCsvFormController;
use Psr\Container\ContainerInterface;

class GetCsvFormControllerFactory
{
  public function __invoke(ContainerInterface $container): GetCsvFormController
  {
    $renderer = $container->get('renderer');
    return new GetCsvFormController($renderer);
  }
}