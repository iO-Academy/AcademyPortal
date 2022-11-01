<?php

namespace Portal\Controllers\FrontEnd;

use Portal\Models\ApplicationFormModel;
use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Views\PhpRenderer;

class StudentApplicationFormPageController
{
    protected ApplicationFormModel $model;
    protected PhpRenderer $view;

    public function __construct(ApplicationFormModel $model, PhpRenderer $view)
    {
        $this->model = $model;
        $this->view = $view;
    }

    /**
     * Renders the studentApplicationsForm page,
     * passes in backgroundInfo and hearAbout variables to be used on the page.
     */
    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $data = [
            'dropDownData' => [
                'backgroundInfo' => $this->model->getBackgroundInfo(),
                'hearAbout' => $this->model->getHearAbout(),
                'cohorts' => $this->model->getCohorts(),
                'genders' => $this->model->getGenders()
            ]
        ];
        return $this->view->render($response, 'studentApplicationForm.phtml', $data);
    }
}
