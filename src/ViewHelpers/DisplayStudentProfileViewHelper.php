<?php

namespace Portal\ViewHelpers;

use Portal\Entities\CompleteApplicantEntity;

class DisplayStudentProfileViewHelper
{
    public static function outputApplicant(CompleteApplicantEntity $applicant): string
    {
        return '<hr>
                <section>
                    <h4>Personal Information</h4>
                    <p class="detail">Name: <span>' . $applicant->getName() . '</span></p>
                    <p class="detail">Email: <span>' . $applicant->getEmail() . '</span></p>
                    <p class="detail">Phone Number: <span>' . $applicant->getPhoneNumber() . '</span></p>
                 <hr>
                 <section>
                    <h4>Application Info</h4>
                    <p class="detail">Stage: <span id="stageName">' . $applicant->getStageName() . '</span></p>
                    <p class="detail" id="stageOptionNameContainer">Stage Option: 
                    <span id="stageOptionName">' . ($applicant->getStageOptionName() ?? '--') . '</span></p>
                    <p class="detail">Cohort: <span id="cohortDate">' . $applicant->getCohortDate() . '</span></p>
                    <p class="detail">Reason for wanting to be a dev:</p>
                    <p id="whyDev">' . $applicant->getWhyDev() . '</p>
                    <p class="detail">Code Experience:</p>
                    <p id="codeExperience">' . $applicant->getCodeExperience() . '</p>
                    <p class="detail">Heard About Us: <span id="hearAbout">' . $applicant->hearAbout . '</span></p>
                    <p class="detail" id="eligible">Eligible to study in the UK: ' . '<span>'
                        . ($applicant->getEligible() === 1 ? 'Yes' : 'No') . '</span></p>
                    <p class="detail" id="eighteenPlus">Over 18 years: ' . '<span>'
                        . ($applicant->getEighteenPlus() === 1 ? 'Yes' : 'No') . '</span></p>
                    <p class="detail">Finance: <span id="finance">'
                        . ($applicant->getFinance() === 1 ? 'Yes' : 'No') . '</span></p>
                    <p class="detail">Notes: </p>
                    <p id="notes"> ' . $applicant->getNotes() . '</p>
                </section>
                <hr>
                <section>
                    <h4>Assessment</h4>
                    <p class="detail">Assessment day: <span id="assessmentDay">'
                        . $applicant->getAssessmentDay() . '</span></p>
                    <p class="detail">Assessment Time: <span id="assessmentTime">'
                        . $applicant->getAssessmentTime() . '</span>
                    <p class="detail">Aptitude Score: <span id="aptitude">' . $applicant->getAptitude() . '</span></p>
                    <p class="detail">Assessment notes:</p>
                    <p id="assessmentNotes">' . $applicant->getAssessmentNotes() . '</p>
                </section>
                <hr>
                <section>
                    <h4>Onboarding Info</h4>
                    <p class="detail">Diversitech amount: <span id="diversitech">'
                        . $applicant->getDiversitech() . '</span>
                    <p class="detail">EdAid amount: <span id="edaid">' . $applicant->getEdaid() . '</span></p>
                    <p class="detail">Upfront amount: <span id="upfront">' . $applicant->getUpfront() . '</span></p>
                    <p class="detail">Laptop required: <span id="laptop">' . $applicant->getLaptop() . '</span></p>
                    <p class="detail">Laptop deposit paid: <span id="laptopDeposit"span>'
                        . $applicant->getLaptopDeposit() . '</p>
                    <p class="detail">Laptop number: <span id="laptopNum">' . $applicant->getLaptopNum() . '</span></p>
                    <p class="detail">Kit collection date: <span id="kitCollectionDay"span>'
                        . $applicant->getKitCollectionDay() . '</p>
                    <p class="detail">Kit collection time: <span id="kitCollectionTime"span>'
                        . $applicant->getKitCollectionTime() . '</p>
                    <p class="detail">Kit number: <span id="kitNum">' . $applicant->getKitNum() . '</span></p>
                </section>
                <hr>
                <section>
                    <h4>Student profile</h4>
                    <p class="detail">GitHub Username: <span id="githubUser"></span></p>
                    <p class="detail">GitHub Link: <span id="githubLink"></span></p>
                    <p class="detail">Portfolio: <span id="portfolio"></span></p>
                    <p class="detail">Plesk Hosting URL: <span id="pleskHostUrl"></span></p>
                    <p class="detail">Plesk Username: <span id="pleskUsername"></span></p>
                    <p class="detail">Plesk Password: <span id="pleskPassword"></span></p>
                    <p class="detail">GitHub Education Link: <span id="githubEduLink"></span></p>
                    <p class="detail">Notes: <span id="notes"></span></p>
                    <p class="detail">Course Date Confirmed: <span id="courseDate"></span></p>
                </section>
                </section>';
    }
}
