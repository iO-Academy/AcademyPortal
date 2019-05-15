<?php

namespace Portal\Controllers;

use Portal\Models\CohortModel;
use \Slim\Http\Request as Request;
use \Slim\Http\Response as Response;
use Slim\Views\PhpRenderer;
use Portal\Models\ApplicantModel;

class DisplayApplicantsController
{
    private $renderer;
    private $applicantModel;
    private $cohortModel;

    /**
     * DisplayApplicantsController constructor.
     *
     * @param PhpRenderer $renderer
     *
     * @param ApplicantModel $applicantModel
     */
    public function __construct(PhpRenderer $renderer, ApplicantModel $applicantModel, CohortModel $cohortModel)
    {
        $this->renderer = $renderer;
        $this->applicantModel = $applicantModel;
        $this->cohortModel = $cohortModel;
    }

    /**
     * Renders applicant data on the front end in displayApplicants.phtml.
     *
     * @param Request $request
     * @param Response $response
     * @param array $args
     *
     * @return \Psr\Http\Message\ResponseInterface.
     */
    public function __invoke(Request $request, Response $response, array $args)
    {
        $args['data'] = $this->applicantModel->getAllApplicants();
        $args['cohorts'] = $this->cohortModel->getCohorts();
        return $this->renderer->render($response, 'displayApplicants.phtml', $args);
    }
}
