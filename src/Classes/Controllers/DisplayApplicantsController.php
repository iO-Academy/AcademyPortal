<?php


namespace Portal\Controllers;

use \Slim\Http\Request as Request;
use \Slim\Http\Response as Response;
use Slim\Views\PhpRenderer;
use Portal\Models\ApplicantModel;

class DisplayApplicantsController
{
    private $renderer;
    private $applicantModel;

    /**
     * DisplayTodosController constructor.
     *
     * @param PhpRenderer $renderer
     *
     * @param ApplicantModel $applicantModel
     */
    public function __construct(PhpRenderer $renderer, ApplicantModel $applicantModel)
    {
        $this->renderer = $renderer;
        $this->applicantModel = $applicantModel;
    }

    /**
     * Renders applicant data on the front end in display.phtml.
     *
     * @param Request $request
     * @param Response $response
     * @param array $args
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function __invoke(Request $request, Response $response, array $args)
    {
        $data = $this->applicantModel->getAllApplicants();
        $args['data'] = $data;
        return $this->renderer->render($response, 'displayApplicants.phtml', $args);
    }
}
