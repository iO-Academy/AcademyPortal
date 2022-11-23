<?php

namespace Portal\Controllers\FrontEnd;

use Portal\Models\ApplicantsReportsModel;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\PhpRenderer;

class ApplicantReportsPageController
{
    private ApplicantsReportsModel $applicantsReportsModel;
    private PhpRenderer $renderer;

    public function __construct(PhpRenderer $renderer, ApplicantsReportsModel $applicantsReportsModel)
    {
        $this->applicantsReportsModel = $applicantsReportsModel;
        $this->renderer = $renderer;
    }

    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $data = $this->applicantsReportsModel->extractDataForApplicantReports(3, 20190101, 20220101);
        return $this->renderer->render($response, 'applicantReports.phtml', ['reports' => $data]);
    }
}
