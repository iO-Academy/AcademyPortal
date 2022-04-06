<?php

namespace Portal\Controllers\FrontEnd;

use Portal\Abstracts\Controller;
use Portal\Models\ApplicantModel;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\PhpRenderer;

class GdprCompliancePageController extends Controller
{
    private $renderer;
    private $applicantModel;

    /**
     * Creates new instance of EventsPageController
     *
     * @param PhpRenderer $renderer
     * @param ApplicantModel $applicantModel
     */
    public function __construct(PhpRenderer $renderer, ApplicantModel $applicantModel)
    {
        $this->renderer = $renderer;
        $this->applicantModal = $applicantModel;
    }

    /**
     * Checks for logged-in status,
     * gets event categories from DB
     * and returns rendered landing screen for Events page
     *
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     */

    public function __invoke(Request $request, Response $response, array $args)
    {
        if ($_SESSION['loggedIn'] === true) {
//            $args['eventType'] = 'Upcoming';
            return $this->renderer->render($response, 'gdprCompliance.phtml', $args);
        } else {
            return $response->withHeader('Location', './');
        }
    }
}