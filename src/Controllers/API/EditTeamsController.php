<?php

namespace Portal\Controllers\API;

use Exception;
use Portal\Abstracts\Controller;
use Portal\Entities\ApplicantEntity;
use Portal\Models\ApplicantModel;
use Portal\Models\TeamModel;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class EditTeamsController extends Controller
{
    private $applicantModel;
    private $teamModel;

    /**
     * @param ApplicantModel $applicantModel
     * @param TeamModel $teamModel
     */
    public function __construct(ApplicantModel $applicantModel, TeamModel $teamModel)
    {
        $this->applicantModel = $applicantModel;
        $this->teamModel = $teamModel;
    }

    /**
     * If user is logged in, invoke gets data from new applicant form and passes into insertNewApplicantToDb
     * function for inserting into database.
     * If successful Insert returns success true with message of application saved.
     *
     * @param Request $request
     * @param Response $response
     * @param array $args The arguments array
     *
     * @return Response, will return the data from successfulRegister and the statusCode, via Json.
     * @throws Exception
     */
    public function __invoke(Request $request, Response $response, array $args)
    {
        if ($_SESSION['loggedIn'] === true) {
            $teamData = $request->getParsedBody();

            if (empty($teamData['team1']['trainer']) || empty($teamData['team2']['trainer'])) {
                $data = [
                    'success' => false,
                    'message' => 'Missing trainer names',
                    'data' => []
                ];
                return $this->respondWithJson($response, $data, 400);
            }

            try {
                foreach ($teamData as $teamNum => $team) {
                    if (empty($team['teamId'])) {
                        $teamData[$teamNum]['teamId'] = $this->teamModel->createTeam($team['trainer']);
                    }
                    foreach ($team['students'] as $studentId) {
                        $this->applicantModel->addApplicantToTeam($team['teamId'], $studentId);
                    }
                }
            } catch (Exception $e) {
                $statusCode = 400;
                $data['message'] = $e->getMessage();
                return $this->respondWithJson($response, $data, $statusCode);
            }

            $data = [
                'success' => true,
                'message' => 'Teams successfully saved.',
                'data' => [
                    'team1' => $teamData['team1']['teamId'],
                    'team2' => $teamData['team2']['teamId']
                ]
            ];
            return $this->respondWithJson($response, $data, 200);
        }
        return $response->withStatus(401);
    }
}
