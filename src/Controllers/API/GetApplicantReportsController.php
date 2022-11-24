<?php

namespace Portal\Controllers\API;

use PHPUnit\Runner\Exception;
use Portal\Abstracts\Controller;
use Portal\Models\ApplicantReportModel;
use Portal\Validators\DateTimeValidator;
use Portal\Validators\ReportValidator;
use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Views\PhpRenderer;


class GetApplicantReportsController extends Controller
{
    private ApplicantReportModel $applicantReportModel;

    /**
     * @param ApplicantReportModel $applicantReportModel
     */
    public function __construct(ApplicantReportModel $applicantReportModel)
    {
        $this->applicantReportModel = $applicantReportModel;
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
            ReportValidator::validate($args);
            DateTimeValidator::validateStartEndDate($args['start'], $args['end']);
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

        return $this->respondWithJson($response, $responseData, $statusCode);
    }
}