<?php

namespace Portal\Controllers\API;

use Portal\Abstracts\Controller;
use Portal\Sanitisers\CourseCategorySanitiser;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Portal\Models\CourseModel;

class AddCourseCategoryController extends Controller
{
    private CourseModel $courseModel;

    public function __construct(CourseModel $courseModel)
    {
        $this->courseModel = $courseModel;
    }

    /**
     * Get user input and send to CourseModel to add to db.
     */
    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $newCategory = $request->getParsedBody();

        $responseData = [
            'success' => false,
            'message' => 'Unexpected Error.',
            'data' => []
        ];
        $statusCode = 400;

        try {
            $newCategory = CourseCategorySanitiser::sanitise($newCategory);
            $insertedId = $this->courseModel->addCategory($newCategory);
        } catch (\PDOException $pdoException) {
            $responseData['message'] = 'Internal error: ' . $pdoException->getMessage();
            $statusCode = 500;
        } catch (\Exception $exception) {
            $responseData['message'] = $exception->getMessage();
        }

        if (isset($insertedId) && $insertedId) {
            $responseData = [
                'success' => true,
                'message' => 'New Category successfully saved.',
                'data' => []
            ];
            $statusCode = 200;
        }
        return $this->respondWithJson($response, $responseData, $statusCode);
    }
}
