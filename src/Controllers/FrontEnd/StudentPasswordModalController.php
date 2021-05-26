<?php

namespace Portal\Controllers\FrontEnd;

use Portal\Abstracts\Controller;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class StudentPasswordModalController extends Controller
{
    private $password;

    /**
     * Constructs an instance of StudentPasswordModalController with the given renderer and password.
     *
     * @param string $password
     */
    public function __construct(string $password)
    {
        $this->password = $password;
    }

    public function __invoke(Request $request, Response $response, array $args)
    {
        //retrieve ID from args
        //Generate new random password
        //Run a method from applicantmodel (pass into here - id and randpassword) that saves them together
        //Respond with JSON with randompassword
    }
}

