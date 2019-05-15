<?php

namespace Portal\Controllers;

use Slim\Http\Request;
use Slim\Http\Response;
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
    public function __construct(PhpRenderer $renderer, HiringPartnerModel $hiringPartnerModel)
    {
        $this->renderer = $renderer;
        $this->hiringPartnerModel = $hiringPartnerModel;
    }


    /**
     * Uses hiring partner model to add hiring partners with a try/catch for any errors.
     *
     * @param Request $request HTTP request
     * @param Response $response HTTP response
     * @param array $args
     *
     * @return Response HTTP response with redirect
     */
    public function __invoke(Request $request, Response $response, array $args)
    {
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