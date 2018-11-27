<?php

namespace Portal\Controllers;

use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Views\PhpRenderer;
use Portal\Models\HiringPartnerModel;

class AddHiringPartnerPageController
{
    private $renderer;
    private $hiringPartnerModel;

    /**
     * AddHiringPartnerPageController constructor.
     * @param $renderer
     * @param $hiringPartnerModel
     */
    public function __construct(PhpRenderer $renderer, HiringPartnerModel $hiringPartnerModel)
    {
        $this->renderer = $renderer;
        $this->hiringPartnerModel = $hiringPartnerModel;
    }

    public function __invoke(Request $request, Response $response, $args)
    {
        $args['dropdownData'] = $this->hiringPartnerModel->getDropdownData();
        return $this->renderer->render($response, 'test.phtml', $args);
    }

}