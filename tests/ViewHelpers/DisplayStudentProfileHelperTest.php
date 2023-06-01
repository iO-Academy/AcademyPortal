<?php

namespace Tests\ViewHelpers;

use Portal\ViewHelpers\DisplayStudentProfileViewHelper;
use Tests\TestCase;
use Portal\Entities\CompleteApplicantEntity;

class DisplayStudentProfileHelperTest extends TestCase
{
    public function testDisplayStudentProfileHelper()
    {
        $expected = '<hr>
                <section>
                    <h4>Personal Information</h4>
                    <p class="detail">Name: <span>Owen Miller</span></p>
                    <p class="detail">Email: <span>weqi@mailinator.net</span></p>
                    <p class="detail">Phone Number: <span>+532-82-1263991</span></p>
                </section>
                <hr>
                <section>
                    <h4>Application Info</h4>
                    <p class="detail">Stage: <span id="stageName">Onboarding</span></p>
                    <p class="detail" id="stageOptionNameContainer">Stage Option: 
                    <span id="stageOptionName">Onboarding</span></p>
                    <p class="detail">Cohort: <span id="cohortDate">February, 2019</span></p>
                    <p class="detail">Reason for wanting to be a dev:</p>
                    <p id="whyDev">Amet vero minim repudiandae aut ratione voluptas perferendis sequi eu non quaerat 
                    quasi ut est nostrud nihil ad corporis ea</p>
                    <p class="detail">Code Experience:</p>
                    <p id="codeExperience">Ullamco quia quae excepturi possimus quibusdam elit occaecat commodi dolore 
                    facere anim quaerat</p>
                    <p class="detail">Heard About Us: <span id="hearAbout">Back of the toilet door</span></p>
                    <p class="detail" id="eligible">Eligible to study in the UK:<span>No</span></p>
                    <p class="detail" id="eighteenPlus">Over 18 years:<span>No</span></p>
                    <p class="detail">Finance: <span id="finance">No</span></p>
                    <p class="detail">Notes: </p>
                    <p id="notes">Laborum cumque reprehenderit ut qui sapiente nobis commodo iusto veritatis provident 
                    voluptates Nam beatae quis quam illo voluptatibus</p>
                </section>
                <hr>
                <section>
                    <h4>Assessment</h4>
                    <p class="detail">Assessment day: <span id="assessmentDay">2020-06-20</span></p>
                    <p class="detail">Assessment Time: <span id="assessmentTime">13:00</span>
                    <p class="detail">Aptitude Score: <span id="aptitude">73</span></p>
                    <p class="detail">Assessment notes:</p>
                    <p id="assessmentNotes">Laborum cumque reprehenderit ut qui sapiente nobis commodo iusto veritatis 
                    provident voluptates Nam beatae quis quam illo voluptatibus</p>
                </section>
                <hr>
                <section>
                    <h4>Onboarding Info</h4>
                    <p class="detail">Diversitech amount: <span id="diversitech">1000</span>
                    <div class="edaidContainer studentProfileEditableField">
                        <label class="detail" for="edaidTextBox">EdAid amount: </label>
                        <span id="edaidDisplayed">8000</span>
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
                            <button data-selector="edaid" class="btn btn-primary btn-sm cancel">
                            Cancel
                            </button> 
                        </form>
                    </div>
                    <div class="upfrontContainer studentProfileEditableField">
                        <label class="detail" for="upfrontTextBox">Upfront amount: </label>
                        <span id="upfrontDisplayed">1000</span>
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
                            <button data-selector="upfront" class="btn btn-primary btn-sm cancel">
                            Cancel
                            </button>
                        </form>                 
                    </div>
                    <div class="laptopContainer studentProfileEditableField">
                        <label class="detail" for="laptopRadioButtons">Laptop required: </label>
                        <span id="laptopDisplayed">Yes</span>
                        <input data-selector="laptop" class="btn btn-primary btn-sm laptopEditButton 
                        editbutton" id="laptopEditButton" value="Edit">
                    </div>
                    <div data-selector="laptop" class="editablelaptop studentProfileEditableField hidden">
                        <form class="form studentProfileEditableField">
                            <label>Laptop required: </label>
                            <span>
                                <input type="radio" value="0" id="noLaptop" name="laptop" checked="checked">
                                <label for="noLaptop">No</label>
                                <input type="radio" value="1" id="yesLaptop" name="laptop">
                                <label for="yesLaptop">Yes</label>
                            </span>
                            <input data-selector="laptop" class="btn btn-primary btn-sm confirm" value="Confirm" 
                            type="submit">
                            <button data-selector="laptop" class="btn btn-primary btn-sm cancel">
                            Cancel
                            </button>
                        </form>                 
                    </div>
                    <p class="detail">Laptop deposit paid: <span id="laptopDeposit"span>0</p>
                    <p class="detail">Laptop number: <span id="laptopNum">3</span></p>
                    <p class="detail">Kit collection date: <span id="kitCollectionDay"span>2020-08-05</p>
                    <p class="detail">Kit collection time: <span id="kitCollectionTime"span>10:30</p>
                    <p class="detail">Kit number: <span id="kitNum">3</span></p>
                </section>
                <hr>
                <section>
                    <h4>Student profile</h4>
                    <div class="githubUsernameContainer studentProfileEditableField">
                        <label class="detail" for="githubUsername">GitHub Username: </label> 
                        <span id="githubUsernameDisplayed">MrSnuggles</span>
                        <button data-selector="githubUsername" class="btn btn-primary btn-sm githubUsernameEditButton 
                        editbutton" id="githubUsernameEditButton">Edit</button>
                    </div>
                    <div data-selector="githubUsername" class="editablegithubUsername studentProfileEditableField 
                    hidden">
                        <form class="form studentProfileEditableField">
                            <label for="githubUsernameTextBox">GitHub Username:</label>
                            <span>
                                <input type="text" id="githubUsernameTextBox" name="githubUsername">
                            </span>
                            <button data-selector="githubUsername" class="btn btn-primary btn-sm confirm" 
                            type="submit">Confirm</button>
                            <button data-selector="githubUsername" class="btn btn-primary btn-sm cancel">
                            Cancel
                            </button>
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

        $expected = preg_replace('/\s+/', '', $expected); // removes whitespace

        $applicantEntityMock = $this->createMock(CompleteApplicantEntity::class);
        $applicantEntityMock->method('getName')->willReturn('Owen Miller');
        $applicantEntityMock->method('getEmail')->willReturn('weqi@mailinator.net');
        $applicantEntityMock->method('getPhoneNumber')->willReturn('+532-82-1263991');
        $applicantEntityMock->method('getStageName')->willReturn('Onboarding');
        $applicantEntityMock->method('getStageOptionName')->willReturn('Onboarding');
        $applicantEntityMock->method('getCohortDate')->willReturn('February, 2019');
        $applicantEntityMock->method('getWhyDev')->willReturn('Amet vero minim repudiandae aut 
        ratione voluptas perferendis sequi eu non quaerat quasi ut est nostrud nihil ad corporis ea');
        $applicantEntityMock->method('getCodeExperience')->willReturn('Ullamco quia quae excepturi 
        possimus quibusdam elit occaecat commodi dolore facere anim quaerat');
        $applicantEntityMock->method('getHearAbout')->willReturn('Back of the toilet door');
        $applicantEntityMock->method('getEligible')->willReturn('Yes');
        $applicantEntityMock->method('getEighteenPlus')->willReturn('Yes');
        $applicantEntityMock->method('getFinance')->willReturn('Yes');
        $applicantEntityMock->method('getNotes')->willReturn('Laborum cumque reprehenderit ut qui 
        sapiente nobis commodo iusto veritatis provident voluptates Nam beatae quis quam illo voluptatibus');
        $applicantEntityMock->method('getAssessmentDay')->willReturn('2020-06-20');
        $applicantEntityMock->method('getAssessmentTime')->willReturn('13:00');
        $applicantEntityMock->method('getAptitude')->willReturn(73);
        $applicantEntityMock->method('getAssessmentNotes')->willReturn('Laborum cumque reprehenderit ut 
        qui sapiente nobis commodo iusto veritatis provident voluptates Nam beatae quis quam illo voluptatibus');
        $applicantEntityMock->method('getDiversitech')->willReturn(1000);
        $applicantEntityMock->method('getEdAid')->willReturn(8000);
        $applicantEntityMock->method('getUpfront')->willReturn(1000);
        $applicantEntityMock->method('getLaptop')->willReturn(true);
        $applicantEntityMock->method('getLaptopDeposit')->willReturn(0);
        $applicantEntityMock->method('getLaptopNum')->willReturn(3);
        $applicantEntityMock->method('getKitCollectionDay')->willReturn('2020-08-05');
        $applicantEntityMock->method('getKitCollectionTime')->willReturn('10:30');
        $applicantEntityMock->method('getKitNum')->willReturn(3);
        $applicantEntityMock->method('getGithubUsername')->willReturn('MrSnuggles');

        $data = $applicantEntityMock;
        $result = DisplayStudentProfileViewHelper::outputApplicant($data);
        $result = preg_replace('/\s+/', '', $result);// removes whitespace
        $this->assertEquals($expected, $result);
    }
}
