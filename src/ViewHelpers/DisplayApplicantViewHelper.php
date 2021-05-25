<?php

namespace Portal\ViewHelpers;

use Portal\Interfaces\BaseApplicantEntityInterface;

class DisplayApplicantViewHelper
{

    public static function displayTab(array $applicants, string $type, string $sort)
    {
        $dateAsc = ($sort == 'dateAsc' || empty($sort)) ? ' active' : '';
        $dateDesc = ($sort == 'dateDesc') ? ' active' : '';
        $cohortAsc = ($sort == 'cohortAsc') ? ' active' : '';
        $cohortDesc = ($sort == 'cohortDesc') ? ' active' : '';
        $active = ($type == 'paying') ? ' active' : '';

        $result = '<div class="tab-pane' . $active . '" role="tabpanel" id="' . $type . '">
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
                        <th class="sort">Cohort
                            <div class="cohortSort">
                            <button name="sort" value="cohortAsc" class="arrowBtn' . $cohortAsc . '" type="submit">
                                <i id="arrowCohortAsc" class="glyphicon glyphicon-triangle-top"></i>
                            </button>
                            <button name="sort" value="cohortDesc" class="arrowBtn' . $cohortDesc . '" type="submit">
                                <i id="arrowCohortDesc" class="glyphicon glyphicon-triangle-bottom"></i>
                            </button>
                            </div>
                        </th>
                        <th>Stage</th>
                        <th class="col-xs-2"></th> 
                    </tr>';
        if ($type == 'paying') {
            $result .= self::displayApplicants($applicants);
        } else {
            $result .= self::displayApprentices($applicants);
        }
        $result .= '</table></div>';
        return $result;
    }




    /**
     * Concatenates new applicant's name, email and cohort to join ready to be output, excluding apprentices.
     *
     * @param $applicants
     *
     * @return string $result, returns name, email, cohortID and all the data for the applicant.
     */
    public static function displayApplicants($applicants): string
    {
        $result = '';
        foreach ($applicants['applicants'] as $applicant) {
            if (empty($applicant->apprentice)) {
                $result .= self::outputApplicantRow($applicant, $applicants['lastStage']);
            }
        }
        return self::handleNoApplicants($result);
    }

    /**
     * Concatenates new apprentice applicant's name, email and cohort to join ready to be output.
     *
     * @param $applicants
     *
     * @return string $result, returns name, email, cohortID and all the data for the applicant.
     */
    public static function displayApprentices($applicants): string
    {
        $result = '';
        foreach ($applicants as $applicant) {
            if (!empty($applicant->apprentice) && $applicant->apprentice == 1) {
                $result .= self::outputApplicantRow($applicant);
            }
        }
        return self::handleNoApplicants($result);
    }


    private static function outputApplicantRow(BaseApplicantEntityInterface $applicant, $lastStage): string
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
                    <td>' . $applicant->getPrettyDateOfApplication() . '</td>
                    <td>' . $applicant->getCohortDate() . '</td>
                    <td id="currentStageName' . $applicant->getId() . '">' . $applicant->getStageName() .
            ($applicant->getStageOptionName() ? ' - ' . $applicant->getStageOptionName() : ' ' ) . '</td>
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
                $applicant->getStageID() . '" data-applicantid="' . $applicant->getId() . '" >
                Next Stage
            </button>';
        }
        $string .= '</td></tr>';
        return $string;
    }

    private static function handleNoApplicants(string $output): string
    {
        if (empty($output)) {
            return '<tr><td colspan="6"><h5 class="text-danger text-center">No Applicants Found.</h5></td></tr>';
        }
        return $output;
    }
}
