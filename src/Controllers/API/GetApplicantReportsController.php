<?php

namespace Portal\Controllers\API;

use Portal\Abstracts\Controller;
use Portal\Models\ApplicantReportModel;
use Portal\Validators\ReportValidator;
use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;


class GetApplicantReportsController extends Controller
{
    private ApplicantReportModel $applicantReportModel;

    /**
     * @param ApplicantReportModel $applicantReportModel
     * @param $renderer
     */
    public function __construct(ApplicantReportModel $applicantReportModel)
    {
        $this->applicantReportModel = $applicantReportModel;
    }

    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $reportRequest = $request->getParsedBody();

        $responseData = [
            'success' => false,
            'message' => 'Unexpected Error.',
            'data' => []
        ];
        $statusCode = 400;

        if ($reportRequest['report-category'] == 1) {
            try {
                $result = $this->applicantReportModel->getGenderReport($reportRequest);
            } catch (\Exception $exception) {
                $responseData['message'] = $exception->getMessage();
            }
        } elseif ($reportRequest['report-category'] == 2) {
            try {
                $result = $this->applicantReportModel->getBackgroundReport($reportRequest);
            } catch (\Exception $exception) {
                $responseData['message'] = $exception->getMessage();
            }
        } else {
            try {
                $result = $this->applicantReportModel->getHeadAboutUsReport($reportRequest);
            } catch (\Exception $exception) {
                $responseData['message'] = $exception->getMessage();
            }
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