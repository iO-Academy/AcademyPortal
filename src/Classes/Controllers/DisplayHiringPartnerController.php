<?php

namespace Portal\Controllers;

use \Slim\Http\Request as Request;
use \Slim\Http\Response as Response;
use Slim\Views\PhpRenderer;
use Portal\Models\HiringPartnerModel;

class DisplayHiringPartnerController {
    private $hiringPartnerModel;
    private $renderer;

    public function __construct(PhpRenderer $renderer, HiringPartnerModel $hiringPartnerModel)
    {
        $this->renderer = $renderer;
        $this->hiringPartnerModel = $hiringPartnerModel;
    }

    public function __invoke(Request $request, Response $response, array $args)
    {
        $args['companySize'] = $this->hiringPartnerModel->getCompanySize();
        $this->renderer->render($response, 'hiringPartnerPage.phtml', $args);
    }
}