<?php

namespace Portal\Factories;


use Portal\Controllers\SearchController;
use Psr\Container\ContainerInterface;

class SearchControllerFactory
{
    /**
     * Controller factory invoke
     *
     * @param ContainerInterface $container The dependency container
     *
     * @return SearchController a new search Controller
     */
    public function __invoke(ContainerInterface $container)
 {
     $applicantModel = $container->get('ApplicantModel');
     return new SearchController($applicantModel);
 }
}