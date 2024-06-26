<?php

namespace Portal\Controllers\API;

use Portal\Abstracts\Controller;
use Portal\Models\CourseModel;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class DeleteCourseCategoryController extends Controller
{
    private CourseModel $courseModel;

    public function __construct(CourseModel $courseModel)
    {
        $this->courseModel = $courseModel;
    }

    /**
     * Calls a method to remove course category from display by updating deleted column
     * and responds with Json success message
     */
    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $data = $request->getParsedBody();
        $deletedCategory = $data['id'];

        try {
            $this->courseModel->deleteCategory($deletedCategory);

            $data = [
                'success' => true,
                'message' => 'Category deleted',
                'id' => [$deletedCategory]
            ];
            return $this->respondWithJson($response, $data);
        } catch (\Exception $e) {
            $data = [
                'success' => false,
                'message' => 'Unexpected error occurred'
            ];
            return $this->respondWithJson($response, $data, 500);
        }
    }
}
