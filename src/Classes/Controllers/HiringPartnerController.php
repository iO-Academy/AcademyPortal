<?php

namespace Portal\Controllers;

use \Slim\Http\Request as Request;
use \Slim\Http\Response as Response;
use Slim\Views\PhpRenderer;
use Portal\Models\HiringPartnerModel;

class HiringPartnerController {
    public $hiringPartnerModel;
    public $renderer;

    /**
     * HiringPartnerController constructor.
     *
     * @param PhpRenderer $renderer
     * @param $hiringPartnerModel
     */
    public function __construct(PhpRenderer $renderer, $hiringPartnerModel)
    {
        $this->renderer = $renderer;
        $this->hiringPartnerModel = $hiringPartnerModel;
    }

    /**
     * Uses hiring partner model to add hiring partners with a try/catch for any errors.
     *
     * @param $request
     * @param $response
     * @param $args
     * @return mixed redirect to hiring partner page.
     */
    public function __invoke($request, $response, $args) {

        $userData = $request->getParsedBody();
        $addHiringPartner = $userData['addHiringPartner'];
        try {
            $this->hiringPartnerModel->addHiringPartner($addHiringPartner);
        }
        catch (\Exception $exception) {
            $args['errorMessage'] = $exception->getMessage();
            $this->renderer->render($response, 'error.phtml', $args);
        }
        return $response->withRedirect('/hiringpartnerpage.phtml');
    }
}