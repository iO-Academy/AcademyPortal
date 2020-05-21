<?php

namespace Tests\ViewHelpers;

use Portal\Entities\ApplicantEntity;
use Portal\ViewHelpers\ApplicantFormViewHelper;

class ApplicantFormViewHelperTest extends \PHPUnit\Framework\TestCase
{
    public function testRunMethodSuccess()
    {
        $entityMock = $this->createMock(ApplicantEntity::class);
        $entityMock->method('getName')->willReturn('test');

        $actual = ApplicantFormViewHelper::runMethod($entityMock, 'getName');

        $this->assertEquals('test', $actual);
    }

    public function testRunMethodSucessNull()
    {
        $entityMock = $this->createMock(ApplicantEntity::class);

        $actual = ApplicantFormViewHelper::runMethod($entityMock, 'getName');

        $this->assertEquals('', $actual);
    }
}
