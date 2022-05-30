<?php

namespace Portal\Controllers\API;

use Portal\Abstracts\Controller;
use Portal\Models\ApplicantModel;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class CsvController extends Controller
{
    private const FILE_EXTENSIONS_ALLOWED = ['csv', 'txt'];
    private const VALID_FILE_TYPE = 'text/csv';

    private ApplicantModel $applicantModel;

    public function __construct($applicantModel)
    {
        $this->applicantModel = $applicantModel;
    }

    public function __invoke(Request $request, Response $response, array $args)
    {
        $forResponse = '<p>Invalid file format - CSV Not Uploaded</p>';
        if (
            !isset($body['submit'])
            || !$this->validateFile(
                $_FILES['csv'],
                self::FILE_EXTENSIONS_ALLOWED,
                self::VALID_FILE_TYPE
            )
        ) {
            // Use model to add data to database
            foreach ($this->replaceValuesWithForeignKeys() as $applicant) {
                $result = $this->applicantModel->storeApplicant($applicant);

                if ($result > 0) {
                    $forResponse = '<p>CSV Uploaded successfully</p>';
                } else {
                    $forResponse = '<p>CSV Not Uploaded</p>';
                }
            }
        }

        $response->getBody()->write($forResponse);
        return $response;
    }

    private function validateFile(
        array $file,
        array $fileExtensionsAllowed,
        string $validFileType
    ): bool {
        $fileName = $file['name'];
        $fileNameArr = explode('.', $fileName);
        $fileExtension = strtolower(end($fileNameArr));
        $fileType = $file['type'];
        $fileSize = $file['size'];
        if (
            !in_array($fileExtension, $fileExtensionsAllowed)
            || $fileType !== $validFileType
            || $fileSize == 0
        ) {
            return false;
        }

        return true;
    }

    private function csvToAssocArr(): array
    {
        $file = $_FILES['csv']['tmp_name'];
        $rows = array_map('str_getcsv', file($file));
        $header = array_shift($rows);
        $applicants = array();
        foreach ($rows as $row) {
            $applicants[] = array_combine($header, $row);
        }
        $cohortApplicants = [];
        foreach ($applicants as $applicant) {
            $applicant['cohort'] = [$applicant['cohort']];
            $cohortApplicants[] = $applicant;
        }

        return $cohortApplicants;
    }

    private function replaceValuesWithBinary(): array
    {
        $applicantsWithBinary = [];
        $applicants = $this->csvToAssocArr();
        foreach ($applicants as $applicant) {
            $applicant['eligible'] = $applicant['eligible'] === 'y' ? 1 : 0;
            $applicant['eighteenPlus'] = $applicant['eighteenPlus'] === 'y' ? 1 : 0;
            $applicant['finance'] = $applicant['finance'] === 'y' ? 1 : 0;
            $applicantsWithBinary[] = $applicant;
        }

        return $applicantsWithBinary;
    }

    private function replaceValuesWithForeignKeys(): array
    {
        $applicantsWithFKs = [];
        $applicants = $this->replaceValuesWithBinary();
        foreach ($applicants as $applicant) {
            $applicant['gender'] = $this->applicantModel->getForeignKey(
                'gender',
                'gender',
                $applicant['gender']
            );
            $applicant['hearAboutId'] = $this->applicantModel->getForeignKey(
                'hear_about',
                'hearAbout',
                $applicant['hearAboutId']
            );
            $applicant['backgroundInfoId'] = $this->applicantModel->getForeignKey(
                'background_info',
                'backgroundInfo',
                $applicant['backgroundInfoId']
            );
            $applicantsWithFKs[] = $applicant;
        }

        return $applicantsWithFKs;
    }
}
