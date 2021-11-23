<?php

namespace Portal\Controllers\FrontEnd;

use Portal\Models\ApplicationFormModel;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Slim\Views\PhpRenderer;

class StudentApplicationFormPageController
{
    protected ApplicationFormModel $model;
    protected PhpRenderer $view;

    /**
     * @param ApplicationFormModel $model
     * @param PhpRenderer $view
     */
    public function __construct(ApplicationFormModel $model, PhpRenderer $view)
    {
        $this->model = $model;
        $this->view = $view;
    }

    /**
     * Renders the studentApplicationsForm page,
     * passes in backgroundInfo and hearAbout variables to be used on the page.
     *
     * @param RequestInterface $request
     * @param ResponseInterface $response
     * @param array $args
     * @return ResponseInterface
     */
    public function __invoke(RequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $pageNumber = $args['pageNumber'] ?? 1;
        if (is_numeric($pageNumber)) {
            $pageNumber = (int) $pageNumber;
        }
        if (!is_int($pageNumber) || $pageNumber < 1) {
            $pageNumber = 1;
        }
        $data = [
            'pageNumber' => $pageNumber,
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
