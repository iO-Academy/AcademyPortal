<?php

namespace Portal\Controllers\API;

use Portal\Abstracts\Controller;
use Portal\Models\CsvModel;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class CsvController extends Controller
{
  private CsvModel $csvModel;

  public function __construct($csvModel)
  {
    $this->csvModel = $csvModel;
  }


  public function __invoke(Request $request, Response $response, array $args)
  {
    // TODO: Implement __invoke() method.
    $newUpload = $request->getParsedBody();

    $forResponse = '<pre>' . print_r($newUpload, true) . '</pre>';

    // Use model to add data to database
    $result = $this->csvModel->uploadCsv($newUpload);

    if ($result > 0) {
      $forResponse .= '<p>Book saved successfully</p>';
    } else {
      $forResponse .= '<p>Book not saved</p>';
    }

    $response->getBody()->write($forResponse);
    return $response;
  }
}
