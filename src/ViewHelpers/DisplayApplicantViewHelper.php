<?php

namespace Portal\ViewHelpers;

use Portal\Interfaces\BaseApplicantEntityInterface;
use Portal\Interfaces\ApplicantEntityInterface;

class DisplayApplicantViewHelper
{
    public static function displayApplicantTable(array $data, string $sort): string
    {
        $dateAsc = ($sort == 'dateAsc' || empty($sort)) ? ' active' : '';
        $dateDesc = ($sort == 'dateDesc') ? ' active' : '';

        $numberOfApplicantsPerPage = 20;

        $tableHtml = '';
        foreach ($data['applicantTabs'] as $index => $applicantTab) {
            $applicants = $applicantTab['applicants'];

            $numberOfPages = ceil(count($applicants) / $numberOfApplicantsPerPage);
            if (isset($_SESSION['page']) && ($_SESSION['page'] > $numberOfPages || $_SESSION['page'] < 1)) {
                $_SESSION['page'] = 1;
            }

            $applicantsToDisplay =
                array_slice($applicants, (($_SESSION['page'] - 1) * $numberOfApplicantsPerPage), $numberOfApplicantsPerPage);

            $active = '';
            if($index === 0){
                $active = 'active';
            };

            $tableHtml .= '
                <div class="tab-pane ' . $active . '" role="tabpanel" id="' . $applicantTab['name'] . '">
                    <table class="col-xs-12 table-bordered table">
                        <tr>
                            <th class="col-xs-2">Name</th>
                            <th class="col-xs-3">Email</th>
                            <th class="col-xs-2 sort">Application Date
                                <div>
                                <button name="sort" value="dateAsc" class="arrowBtn' . $dateAsc . '" type="submit">
                                    <i id="arrowDateAsc" class="glyphicon glyphicon-triangle-top"></i>
                                </button>
                                <button name="sort" value="dateDesc" class="arrowBtn' . $dateDesc . '" type="submit">
                                    <i id="arrowDateDesc" class="glyphicon glyphicon-triangle-bottom"></i>
                                </button>
                                </div>
                            </th>
                            <th>Cohort</th>
                            <th>Stage</th>
                            <th class="col-xs-2"></th>
                            ';



            if (empty($applicants)) {
                $tableHtml .= '<tr><td colspan="6"><h5 class="text-danger text-center">No Applicants Found.</h5></td></tr>';
            } else {
                foreach ($applicantsToDisplay as $applicant) {
                    $tableHtml .= self::outputApplicantRow($applicant, $data['lastStage'], $data['stageCount']);
                }
            }

            $tableHtml .= '
                        </tr>
                    </table>
                    ' . \Portal\ViewHelpers\PaginationViewHelper::pagination($_SESSION['page'], $numberOfPages, $applicantTab['name']) . '
                </div>';
        }

        return $tableHtml;
    }

    public static function displayApplicantTabs(array $tabs): string {
        $tabsHtml = '';
        foreach($tabs as $applicantTab) {
            $tabsHtml .= '<li role="presentation" class="'. $applicantTab['name'] . '" id="' . $applicantTab['name'] . '-tab-button">' .
                '<a href="#' . $applicantTab['name'] . '" aria-controls="' . $applicantTab['name'] . '" role="tab" data-toggle="tab">' . $applicantTab['displayName'] . '</a>' .
                '</li>';
        }
        return $tabsHtml;
    }

    private static function outputApplicantRow(BaseApplicantEntityInterface $applicant, $lastStage, $stageCount): string
    {
        $string = '<tr>
                    <td>
                        <a 
                        href="#"
                        data-id="' . $applicant->getId() . '" 
                           type="button"  
                           class="myBtn">
                          ' . $applicant->getName() . '
                        </a>
                    </td>
                    <td>' . $applicant->getEmail() . '</td>
                    <td>' . $applicant->getPrettyDateOfApplication() . '</td>';
        if (!empty($applicant->getChosenStartDate())) {
            $string .= '<td>' . $applicant->getChosenStartDate() . '<i class="glyphicon glyphicon-check text-success">
            </i></td>';
        } else {
            $string .= '<td>' . $applicant->getCohortDate() . '</td>';
        };
        $string .= '<td id="currentStageName' . $applicant->getId() . '">' . $applicant->getStageName() .
            ($applicant->getStageOptionName() ? ' - ' . $applicant->getStageOptionName() : ' ') . '</td>
                    <td>                        
                        <a href="/editApplicant?id=' . $applicant->getId() . '"
                           type="button" 
                           class="btn btn-primary edit">
                           Edit
                        </a>
                        <a
                            href="#"
                            type="delete"
                            class="btn btn-danger delete deleteBtn"
                            data-id="' . $applicant->getId() . '">
                            Delete
                        </a>';
        if ($applicant->getStageID() != $lastStage) {
            $string .= '<button type="button" class="btn btn-info btnNextStage" data-stageid="' .
                $applicant->getStageID() . '" data-applicantid="' . $applicant->getId() . '" data-stagecount="' .
                $stageCount['stagesCount']  . '" data-currentoptionname="' . $applicant->getStageOptionName() . '">
                Next Stage
            </button>';
        }
        $string .= '</td></tr>';
        return $string;
    }


}
