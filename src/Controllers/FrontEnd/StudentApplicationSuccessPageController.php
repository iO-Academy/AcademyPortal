<?php

namespace Portal\Controllers\FrontEnd;

use Portal\Models\ApplicationFormModel;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Slim\Views\PhpRenderer;

class StudentApplicationSuccessPageController
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
     * Renders the studentApplicationsSuccess page,
     *
     * @param RequestInterface $request
     * @param ResponseInterface $response
     * @param array $args
     * @return ResponseInterface
     */
    public function __invoke(RequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        return $this->view->render($response, 'studentApplicationSuccess.phtml');
    }
}
