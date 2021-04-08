<?php

namespace Tests\ViewHelpers;

use PHPUnit\Framework\TestCase;
use Portal\Entities\BaseApplicantEntity;
use Portal\ViewHelpers\DisplayApplicantViewHelper;

class DisplayApplicantViewHelperTest extends TestCase
{
    public function testSuccessDisplayApplicants()
    {
        $expected = '<tr>
                                <td>
                                    <a 
                                    href="#"
                                    data-id="1" 
                                       type="button"  
                                       class="myBtn">
                                      Test
                                    </a>
                                </td>
                                <td>test@test.com</td>
                                <td>Jan 1st</td>
                                <td>Feb 2020</td>
                                <td id="currentStageName1">New application</td>
                                <td>                              
                                    <a href="/editApplicant?id=1"   
                                       type="button"
                                       class="btn btn-primary edit">
                                       Edit
                                    </a>
                                    <a
                                            href="#"
                                            type="delete"
                                            class="btn btn-danger delete deleteBtn"
                                            data-id="1">
                                            Delete
                                    </a>    
                                    <button type="button" class="btn btn-info btnNextStage" data-stageid="1" 
                                    data-applicantid="1">Next Stage</button>                               
                                </td>
                            </tr>';
        $expected = preg_replace('/\s+/', '', $expected); // removes whitespace

        $entityMock = $this->createMock(BaseApplicantEntity::class);
        $entityMock->method('getId')->willReturn(1);
        $entityMock->method('getName')->willReturn('Test');
        $entityMock->method('getEmail')->willReturn('test@test.com');
        $entityMock->method('getPrettyDateOfApplication')->willReturn('Jan 1st');
        $entityMock->method('getCohortDate')->willReturn('Feb 2020');
        $entityMock->method('getStageName')->willReturn('New application');
        $entityMock->method('getStageID')->willReturn('1');

        $data = ['applicants' => [$entityMock], 'lastStage' => '9'];
        $result = DisplayApplicantViewHelper::displayApplicants($data);
        $result = preg_replace('/\s+/', '', $result);// removes whitespace
        $this->assertEquals($expected, $result);
    }

    public function testSuccessDisplayApplicantsEmptyArray()
    {
        $data = ['applicants' => [], 'lastStage' => '9'];
        $expected = '<tr><td colspan="6"><h5 class="text-danger text-center">No Applicants Found.</h5></td></tr>';
        $result = DisplayApplicantViewHelper::displayApplicants($data);
        $this->assertEquals($expected, $result);
    }

    public function testFailureDisplayApplicantsIncorrectEntity()
    {
        $mock = $this->createMock(\stdClass::class);
        $data = ['applicants' => [$mock], 'lastStage' => '9'];
        $this->expectException(\TypeError::class);
        $result = DisplayApplicantViewHelper::displayApplicants($data);
    }
}
