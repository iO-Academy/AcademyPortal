<?php

namespace Tests\ViewHelpers;

use Portal\ViewHelpers\DisplayStudentProfileViewHelper;
use Tests\TestCase;
use Portal\Entities\CompleteApplicantEntity;

class DisplayStudentProfileHelperTest extends TestCase
{
    public function testDisplayStudentProfileHelper()
    {
        $expected =    '<hr>
                        <section>
                        <h4>PersonalInformation</h4>
                        <pclass="detail">Name:<span>OwenMiller</span></p>
                        <pclass="detail">Email:<span>weqi@mailinator.net</span></p>
                        <pclass="detail">PhoneNumber:<span>+532-82-1263991</span></p>
                    <hr>
                    <section>
                        <h4>ApplicationInfo</h4>
                        <pclass="detail">Stage:<spanid="stageName">Onboarding</span></p>
                        <pclass="detail"id="stageOptionNameContainer">StageOption:
                        <spanid="stageOptionName">Onboarding</span></p>
                        <pclass="detail">Cohort:<spanid="cohortDate">February,2019</span></p>
                        <pclass="detail">Reasonforwantingtobeadev:</p>
                        <pid="whyDev">Ametverominimrepudiandaeautrationevoluptasperferendissequieunonquaerat
                        quasiutestnostrudnihiladcorporisea</p>
                        <pclass="detail">CodeExperience:</p>
                        <pid="codeExperience">Ullamcoquiaquaeexcepturipossimusquibusdamelitoccaecatcommodido
                        lorefacereanimquaerat</p>
                        <pclass="detail">HeardAboutUs:<spanid="hearAbout">Backofthetoiletdoor</span></p>
                        <pclass="detail"id="eligible">EligibletostudyintheUK:<span>No</span></p>
                        <pclass="detail"id="eighteenPlus">Over18years:<span>No</span></p>
                        <pclass="detail">Finance:<spanid="finance">No</span></p><pclass="detail">Notes:</p>
                        <pid="notes">Laborumcumquereprehenderitutquisapientenobiscommodoiustoveritatisprovidentvolu
                        ptatesNambeataequisquamillovoluptatibus</p>
                        </section>
                        <hr><section><h4>Assessment</h4>
                        <pclass="detail">Assessmentday:<spanid="assessmentDay">2020-06-20</span></p>
                        <pclass="detail">AssessmentTime:<spanid="assessmentTime">13:00</span>
                        <pclass="detail">AptitudeScore:<spanid="aptitude">73</span></p>
                        <pclass="detail">Assessmentnotes:</p>
                        <pid="assessmentNotes">Laborumcumquereprehenderitutquisapientenobiscommodoiustoveritatisprovid
                        entvoluptatesNambeataequisquamillovoluptatibus</p>
                        </section>
                    <hr>
                    <section>
                    <h4>OnboardingInfo</h4>
                    <pclass="detail">Diversitechamount:<spanid="diversitech">1000</span>
                    <pclass="detail">EdAidamount:<spanid="edaid">8000</span></p>
                    <pclass="detail">Upfrontamount:<spanid="upfront">1000</span></p>
                    <pclass="detail">Laptoprequired:<spanid="laptop">1</span></p>
                    <pclass="detail">Laptopdepositpaid:<spanid="laptopDeposit"span>0</p>
                    <pclass="detail">Laptopnumber:<spanid="laptopNum">3</span></p>
                    <pclass="detail">Kitcollectiondate:<spanid="kitCollectionDay"span>2020-08-05</p>
                    <pclass="detail">Kitcollectiontime:<spanid="kitCollectionTime"span>10:30</p>
                    <pclass="detail">Kitnumber:<spanid="kitNum">3</span></p>
                    </section>
                    <hr>
                    <section>
                    <h4>Studentprofile</h4>
                    <pclass="detail">GitHubUsername:<spanid="githubUser"></span></p>
                    <pclass="detail">GitHubLink:<spanid="githubLink"></span></p>
                    <pclass="detail">Portfolio:<spanid="portfolio"></span></p>
                    <pclass="detail">PleskHostingURL:<spanid="pleskHostUrl"></span></p>
                    <pclass="detail">PleskUsername:<spanid="pleskUsername"></span></p>
                    <pclass="detail">PleskPassword:<spanid="pleskPassword"></span></p>
                    <pclass="detail">GitHubEducationLink:<spanid="githubEduLink"></span></p>
                    <pclass="detail">Notes:<spanid="notes"></span></p>
                    <pclass="detail">CourseDateConfirmed:<spanid="courseDate"></span></p>
                    </section>
                    </section>';
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
        $applicantEntityMock->hearAbout = 'Back of the toilet door';
        $applicantEntityMock->method('getEligible')->willReturn('Yes');
        $applicantEntityMock->method('getEighteenPlus')->willReturn('Yes');
        $applicantEntityMock->method('getFinance')->willReturn('Yes');
        $applicantEntityMock->method('getNotes')->willReturn('Laborum cumque reprehenderit ut qui 
        sapiente nobis commodo iusto veritatis provident voluptates Nam beatae quis quam illo voluptatibus');
        $applicantEntityMock->method('getAssessmentDay')->willReturn('2020-06-20');
        $applicantEntityMock->method('getAssessmentTime')->willReturn('13:00');
        $applicantEntityMock->method('getAptitude')->willReturn('73');
        $applicantEntityMock->method('getAssessmentNotes')->willReturn('Laborum cumque reprehenderit ut qui 
        sapiente nobis commodo iusto veritatis provident voluptates Nam beatae quis quam illo voluptatibus');
        $applicantEntityMock->method('getDiversitech')->willReturn('1000');
        $applicantEntityMock->method('getEdAid')->willReturn('8000');
        $applicantEntityMock->method('getUpfront')->willReturn('1000');
        $applicantEntityMock->method('getLaptop')->willReturn('1');
        $applicantEntityMock->method('getLaptopDeposit')->willReturn('0');
        $applicantEntityMock->method('getLaptopNum')->willReturn('3');
        $applicantEntityMock->method('getKitCollectionDay')->willReturn('2020-08-05');
        $applicantEntityMock->method('getKitCollectionTime')->willReturn('10:30');
        $applicantEntityMock->method('getKitNum')->willReturn('3');

        $data = $applicantEntityMock;
        $result = DisplayStudentProfileViewHelper::outputApplicant($data);
        $result = preg_replace('/\s+/', '', $result);// removes whitespace
        $this->assertEquals($expected, $result);
    }
}
