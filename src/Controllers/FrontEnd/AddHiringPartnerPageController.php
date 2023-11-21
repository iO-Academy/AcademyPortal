<?php

namespace Portal\Controllers\FrontEnd;

use Portal\Abstracts\Controller;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Views\PhpRenderer;
use Portal\Models\HiringPartnerModel;

class AddHiringPartnerPageController extends Controller
{
    private PhpRenderer $renderer;
    private HiringPartnerModel $hiringPartnerModel;

    public function __construct(PhpRenderer $renderer, HiringPartnerModel $hiringPartnerModel)
    {
        $this->renderer = $renderer;
        $this->hiringPartnerModel = $hiringPartnerModel;
    }

    /**
     * Renders hiring partner company size on the front end in hiringPartners.phtml
     * Renders hiring partner page on the front end in hiringPartners.phtml
     */
    public function __invoke(Request $request, Response $response, array $args): Response
    {
        if (!empty($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {
            $args['companyName'] = $this->hiringPartnerModel->getCompanyName();
            $args['companySize'] = $this->hiringPartnerModel->getCompanySize();
            return $this->renderer->render($response, 'addHiringPartner.phtml', $args);
        } else {
            return $response->withHeader('Location', './')->withStatus(301);
        }
    }
}
