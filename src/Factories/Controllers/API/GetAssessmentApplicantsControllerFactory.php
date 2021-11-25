<?php

namespace Portal\Factories\Controllers\API;

use Portal\Controllers\API\GetAssessmentApplicantsController;
use Psr\Container\ContainerInterface;

class GetAssessmentApplicantsControllerFactory
{
    /**
     * Creates a controller to get all the applicant's booked for assessment.
     *
     * @param ContainerInterface $container
     *
     * @return GetAssessmentApplicantsController a new instance of the GetEventsController
     */
    public function __invoke(ContainerInterface $container)
    {
        $applicantModel = $container->get('ApplicantModel');
        return new GetAssessmentApplicantsController($applicantModel);
    }
}
