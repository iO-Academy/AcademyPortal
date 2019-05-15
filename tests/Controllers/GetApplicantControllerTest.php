<?php
/**
 * Created by PhpStorm.
 * User: academy
 * Date: 2019-05-15
 * Time: 10:19
 */

namespace Tests\Controllers;

use PHPUnit\Framework\TestCase;

use Portal\Controllers\GetApplicantController;
use Portal\Models\ApplicantModel;

class GetApplicantControllerTest extends TestCase
{
    function testConstruct()
    {
        $applicantModel = $this->createMock(ApplicantModel::class);
        $case = new GetApplicantController($applicantModel);
        $expected = GetApplicantController::class;
        $this->assertInstanceOf($expected, $case);
    }

    function testInvoke()
    {
        $this->markTestSkipped (
            'This method currently doesn\'t contain anything to be tested.'
        );
    }
}
