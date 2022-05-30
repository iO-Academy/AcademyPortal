<?php

namespace Portal\Factories\Controllers\API;

use Portal\Controllers\API\CsvController;
use Psr\Container\ContainerInterface;

class CsvControllerFactory
{
  /**
   * Creates AddUserController with dependencies.
   *
   * @param ContainerInterface $container
   *
   * @return CsvController returns object with db connection injected.
   */
  public function __invoke(ContainerInterface $container): CsvController
  {
    $applicantModel = $container->get('ApplicantModel');
    return new CsvController($applicantModel);
  }
}