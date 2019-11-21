<?php

namespace Portal\Controllers;

use \Slim\Http\Request as Request;
use \Slim\Http\Response as Response;
use Slim\Views\PhpRenderer;
use Portal\Models\ApplicantModel;

class DisplayApplicantsController
{
    private $renderer;
    private $applicantModel;

    /**
     * DisplayApplicantsController constructor.
     *
     * @param PhpRenderer $renderer
     *
     * @param ApplicantModel $applicantModel
     */
    public function __construct(PhpRenderer $renderer, ApplicantModel $applicantModel)
    {
        $this->renderer = $renderer;
        $this->applicantModel = $applicantModel;
    }

    /**
     * Renders applicant data on the front end in displayApplicants.phtml.
     *
     * @param Request $request
     * @param Response $response
     * @param array $args
     *
     * @return \Psr\Http\Message\ResponseInterface.
     */
    public function __invoke(Request $request, Response $response, array $args)
    {
        $params = [];
        $sortValue = $request->getQueryParam('sort');
        $filterNumber = $request->getQueryParam('filter');

        $params['sort'] = $sortValue;
        $params['filter'] = $filterNumber;

        $filterNumber = trim($filterNumber);

        var_dump($filterNumber);
//        var_dump($filterValue);

//        if ($filterValue =='August, 2019'){
//            $params['data'] = $this->applicantModel->filterCohort($filterValue);
//            echo 'hello';
//        }

//        if ($filterNumber == null){
//            $filterValue = '';
////            WHERE `cohortId` = 2
//        } else {
//            $filterValue = 'WHERE `cohortId` =' . $filterNumber;
//        }

        if ($sortValue == null){
            $sortValue = 'default';
        }

        switch ($sortValue) {
            case 'dateAsc':
                $params['data'] = $this->applicantModel->sortApplicants('dateAsc', $filterNumber);
                break;

            case 'dateDesc':
                $params['data'] = $this->applicantModel->sortApplicants('dateDesc', $filterNumber);
                break;

            case 'cohortAsc':
                $params['data'] = $this->applicantModel->sortApplicants('cohortAsc', $filterNumber);
                break;

            case 'cohortDesc':
                $params['data'] = $this->applicantModel->sortApplicants('cohortDesc', $filterNumber);
                break;

            case 'default':
                $params['data'] = $this->applicantModel->sortApplicants('dateAsc', $filterNumber);
                break;

            default:
                $params['data'] = $this->applicantModel->getAllApplicants();
        }
        return $this->renderer->render($response, 'displayApplicants.phtml', $params);
    }
}