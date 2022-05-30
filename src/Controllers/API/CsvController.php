<?php

namespace Portal\Controllers\API;

use Portal\Abstracts\Controller;
use Portal\Models\ApplicantModel;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class CsvController extends Controller
{
    private ApplicantModel $applicantModel;

    public function __construct($applicantModel)
    {
        $this->applicantModel = $applicantModel;
    }

    public function __invoke(Request $request, Response $response, array $args)
    {
        // TODO: Implement __invoke() method.
        $file = $_FILES['csv']['tmp_name'];
        $rows = array_map('str_getcsv', file($file));
        $header = array_shift($rows);
        $applicants = array();
        foreach ($rows as $row) {
            $applicants[] = array_combine($header, $row);
        }

        // Use model to add data to database
        foreach ($applicants as $applicant) {
            $result = $this->applicantModel->storeApplicant($applicant);
        }

        if ($result > 0) {
            $forResponse = '<p>CSV Uploaded successfully</p>';
        } else {
            $forResponse = '<p>CSV Not Uploaded</p>';
        }

        $response->getBody()->write($forResponse);
        return $response;
    }
}
