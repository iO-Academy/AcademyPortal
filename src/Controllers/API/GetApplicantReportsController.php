<?php

namespace Portal\Controllers\API;

use Portal\Abstracts\Controller;
use Portal\Models\ApplicantReportModel;
use Portal\Validators\ReportValidator;
use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Views\PhpRenderer;


class GetApplicantReportsController extends Controller
{
    private ApplicantReportModel $applicantReportModel;
    private PhpRenderer $renderer;

    /**
     * @param ApplicantReportModel $applicantReportModel
     * @param PhpRenderer $renderer
     */
    public function __construct(ApplicantReportModel $applicantReportModel, PhpRenderer $renderer)
    {
        $this->applicantReportModel = $applicantReportModel;
        $this->renderer = $renderer;
    }

    public function __invoke(Request $request, Response $response, array $args): Response
    {

        $responseData = [
            'success' => false,
            'message' => 'Unexpected Error.',
            'data' => []
        ];
        $statusCode = 400;

        try {
            $result = $this->applicantReportModel->extractDataForApplicantReports($args['cat'], $args['start'], $args['end']);
        } catch (\Exception $exception) {
            $responseData['message'] = $exception->getMessage();
        }


        if (isset($result) && $result) {
            $responseData = [
                'success' => true,
                'message' => 'Report successfully retrieved.',
                'data' => $result
            ];
            $statusCode = 200;
        }

//        echo '<pre>';
//        print_r($responseData);
//        echo '</pre>';

        return $this->respondWithJson($response, $responseData, $statusCode);
    }
}