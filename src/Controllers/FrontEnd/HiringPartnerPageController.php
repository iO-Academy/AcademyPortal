<?php

namespace Portal\Controllers\FrontEnd;

use Portal\Abstracts\Controller;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Views\PhpRenderer;
use Portal\Models\HiringPartnerModel;

class HiringPartnerPageController extends Controller
{
    private $hiringPartnerModel;
    private $renderer;

    /**
     * HiringPartnerPageController constructor.
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
     * Renders hiring partner company size on the front end in hiringPartners.phtml
     * Renders hiring partner page on the front end in hiringPartners.phtml
     *
     * @param Request $request
     *
     * @param Response $response
     *
     * @param array $args
     *
     * @return Response
     */
    public function __invoke(Request $request, Response $response, array $args)
    {
        if ($_SESSION['loggedIn'] === true) {
            $args['companyName'] = $this->hiringPartnerModel->getCompanyName();
            $args['companySize'] = $this->hiringPartnerModel->getCompanySize();
            return $this->renderer->render($response, 'hiringPartners.phtml', $args);
        } else {
            return $response->withHeader('Location', './');
        }
    }
}
