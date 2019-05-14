<?php
/**
 * Created by PhpStorm.
 * User: academy
 * Date: 2019-05-14
 * Time: 13:50
 */

namespace Portal\Controllers;

use \Slim\Http\Request as Request;
use \Slim\Http\Response as Response;
use Slim\Views\PhpRenderer;
use Portal\Models\HiringPartnerModel;

class GetCompanySizeController
{
    private $renderer;
    private $hiringPartnerModel;

    /**
     * GetCompanySizeController constructor.
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
     * Retrieves Company sizes to be populated for a dropdown list in hiringPartnerPage.phtml.
     *
     * @param Request $request
     * @param Response $response
     * @param array $args
     *
     * @return \Psr\Http\Message\ResponseInterface.
     */
    public function __invoke(Request $request, Response $response, array $args)
    {
        $args['companySize'] = $this->hiringPartnerModel->getCompanySize();
        return $this->renderer->render($response, 'hiringPartnerPage.phtml', $args);
    }
}