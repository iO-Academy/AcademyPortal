<?php

namespace Portal\ViewHelpers;

use Portal\Entities\CompleteApplicantEntity;

class DisplayStudentProfileViewHelper
{
    public static function outputApplicant(CompleteApplicantEntity $applicant): string
    {
        return '<section>
                    <h4>Personal Information</h4>
                    <p class="detail">Name: <span>' . $applicant->getName() . '</span></p>
                    <p class="detail">Email: <span>' . $applicant->getEmail() . '</span></p>
                    <p class="detail">Phone Number: <span>' . $applicant->getPhoneNumber() . '</span></p>
                </section>';
    }
}
