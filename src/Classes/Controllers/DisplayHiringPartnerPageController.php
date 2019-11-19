<?php

namespace Portal\Controllers;

use \Slim\Http\Request as Request;
use \Slim\Http\Response as Response;
use Slim\Views\PhpRenderer;
use Portal\Models\HiringPartnerModel;

class DisplayHiringPartnerPageController
{
    private $hiringPartnerModel;
    private $renderer;

    /**
     * DisplayHiringPartnerPageController constructor.
     *
     * @param PhpRenderer $renderer
     *
     * @param HiringPartnerModel $hiringPartnerModel
     */
    public function __construct(PhpRenderer $renderer, HiringPartnerModel $hiringPartnerModel)
    {
        $this->renderer = $renderer;
        $this->hiringPartnerModel = $hiringPartnerModel;
    }

    /**
     * Renders hiring partner company size on the front end in hiringPartnerPage.phtml
     * Renders hiring partner page on the front end in hiringPartnerPage.phtml
     *
     * @param Request $request
     *
     * @param Response $response
     *
     * @param array $args
     *
     * @return redirect
     */
    public function __invoke(Request $request, Response $response, array $args)
    {
        if ($_SESSION['loggedIn'] === true) {
//            $args['companySize'] = $this->hiringPartnerModel->getCompanySize();
            $args['companyName'] = $this->hiringPartnerModel->getCompanyName();
            $this->renderer->render($response, 'hiringPartnerPage.phtml', $args);
        } else {
            return $response->withRedirect('./');
        }
    }
}
