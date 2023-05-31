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
                </section>
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
                    <p class="detail">Heard About Us: <span id="hearAbout">' . $applicant->getHearAbout() . '</span></p>
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
                    <div class="edaidContainer studentProfileEditableField">
                        <label class="detail" for="edaidTextBox">EdAid amount: </label>
                        <span id="edaidDisplayed">' . $applicant->getEdaid() . '</span>
                        <button data-selector="edaid" class="btn btn-primary btn-sm edaidEditButton editbutton" 
                        id="edaidEditButton">Edit</button>
                    </div>
                    <div data-selector="edaid" class="editableedaid studentProfileEditableField hidden">
                        <form class="form studentProfileEditableField">
                            <label for="edaidTextBox">EdAid amount:</label>
                            <span>
                                <input type="text" oninput="this.value = this.value.replace(/[^0-9]/g, \'\')" 
                                id="edaidTextBox" name="edaid">
                            </span>
                            <button data-selector="edaid" class="btn btn-primary btn-sm confirm" type="submit">
                            Confirm
                            </button>
                        </form>
                    </div>
                    <div class="upfrontContainer studentProfileEditableField">
                        <label class="detail" for="upfrontTextBox">Upfront amount: </label>
                        <span id="upfrontDisplayed">' . $applicant->getUpfront() . '</span>
                        <button data-selector="upfront" class="btn btn-primary btn-sm upfrontEditButton editbutton" 
                        id="upfrontEditButton">Edit</button>
                    </div>
                    <div data-selector="upfront" class="editableupfront studentProfileEditableField hidden">
                        <form class="form studentProfileEditableField">
                            <label for="upfrontTextBox">Upfront amount:</label>
                                <span>
                                    <input type="text" oninput="this.value = this.value.replace(/[^0-9]/g, \'\')" 
                                    id="upfrontTextBox" name="upfront">
                                </span>
                            <button data-selector="upfront" class="btn btn-primary btn-sm confirm" type="submit">
                            Confirm
                            </button>
                        </form>                 
                    </div>
                    <div class="laptopContainer studentProfileEditableField">
                        <label class="detail" for="laptopRadioButtons">Laptop(s) required: </label>
                        <span id="laptopDisplayed">' .
                        (is_null($applicant->getLaptop())
                        ? null : ($applicant->getLaptop() ? 'Yes' : 'No'))
                        . '</span>
                        <input data-selector="laptop" class="btn btn-primary btn-sm laptopEditButton 
                        editbutton" id="laptopEditButton" value="Edit">
                    </div>
                    <div data-selector="laptop" class="editablelaptop studentProfileEditableField hidden">
                        <form class="form studentProfileEditableField">
                            <label>Laptop(s) required: </label>
                            <span>
                                <input type="radio" value="0" id="noLaptop" name="laptop">
                                <label for="noLaptop">No</label>
                                <input type="radio" value="1" id="yesLaptop" name="laptop">
                                <label for="yesLaptop">Yes</label>
                            </span>
                            <input data-selector="laptop" class="btn btn-primary btn-sm confirm" value="Confirm" 
                            type="submit">
                        </form>                 
                    </div>
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
                    <div class="githubUsernameContainer studentProfileEditableField">
                        <label class="detail" for="githubUsername">GitHub Username: </label> 
                        <span id="githubUsernameDisplayed">' . $applicant->getGithubUsername() . '</span>
                        <button data-selector="githubUsername" class="btn btn-primary btn-sm githubUsernameEditButton 
                        editbutton" id="githubUsernameEditButton">Edit</button>
                    </div>
                    <div data-selector="githubUsername" class="editablegithubUsername studentProfileEditableField hidden">
                        <form class="form studentProfileEditableField">
                            <label for="githubUsernameTextBox">GitHub Username:</label>
                            <span>
                                <input type="text" id="githubUsernameTextBox" name="githubUsername">
                            </span>
                            <button data-selector="githubUsername" class="btn btn-primary btn-sm confirm" 
                            type="submit">Confirm</button>
                        </form>
                    </div>
                    <p class="detail">GitHub Link: <span id="githubLink"></span></p>
                    <p class="detail">Portfolio: <span id="portfolio"></span></p>
                    <p class="detail">Plesk Hosting URL: <span id="pleskHostUrl"></span></p>
                    <p class="detail">Plesk Username: <span id="pleskUsername"></span></p>
                    <p class="detail">Plesk Password: <span id="pleskPassword"></span></p>
                    <p class="detail">GitHub Education Link: <span id="githubEduLink"></span></p>
                    <p class="detail">Notes: <span id="notes"></span></p>
                    <p class="detail">Course Date Confirmed: <span id="courseDate"></span></p>
                </section>
                <div class="navbar navbar-fixed-bottom col-sm-offset-9 hidden" id="saveButton">
                <input class="saveButton btn btn-primary btn-sm" type="submit" value="Save">
                </div>';
    }
}
