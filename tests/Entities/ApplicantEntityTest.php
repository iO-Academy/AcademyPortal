<?php

namespace Tests\Entities;

use Portal\Entities\ApplicantEntity;
    use Tests\TestCase;

class ApplicantEntityTest extends TestCase
{
    private function createApplicant()
    {
        return new ApplicantEntity(
            'james',
            'Example@example.com',
            '02920253192',
            1,
            'Why Not?',
            'yes',
            1,
            '1',
            '1',
            '1',
            'notes'
        );
    }

    public function testGetNameSuccess()
    {
        $applicant = $this->createApplicant();
        $result = $applicant->getName();
        $this->assertEquals($result, 'james');
    }

    public function testGetEmailSuccess()
    {
        $applicant = $this->createApplicant();
        $result = $applicant->getEmail();
        $this->assertEquals($result, 'Example@example.com');
    }

    public function testGetPhoneNumberSuccess()
    {
        $applicant = $this->createApplicant();
        $result = $applicant->getPhoneNumber();
        $this->assertEquals($result, '02920253192');
    }

    public function testGetCohortIdSuccess()
    {
        $applicant = $this->createApplicant();
        $result = $applicant->getCohortId();
        $this->assertEquals($result, 1);
    }

    public function testGetWhyDevSuccess()
    {
        $applicant = $this->createApplicant();
        $result = $applicant->getWhyDev();
        $this->assertEquals($result, 'Why Not?');
    }

    public function testGetCodeExperienceSuccess()
    {
        $applicant = $this->createApplicant();
        $result = $applicant->getCodeExperience();
        $this->assertEquals($result, 'yes');
    }

    public function testHearAboutIdSuccess()
    {
        $applicant = $this->createApplicant();
        $result = $applicant->getHearAboutId();
        $this->assertEquals($result, 1);
    }

    public function testGetEligibleSuccess()
    {
        $applicant = $this->createApplicant();
        $result = $applicant->getEligible();
        $this->assertEquals($result, '1');
    }

    public function testGetEighteenPlusSuccess()
    {
        $applicant = $this->createApplicant();
        $result = $applicant->getEighteenPlus();
        $this->assertEquals($result, '1');
    }

    public function testGetFinanceSuccess()
    {
        $applicant = $this->createApplicant();
        $result = $applicant->getFinance();
        $this->assertEquals($result, '1');
    }

    public function testGetNotesSuccess()
    {
        $applicant = $this->createApplicant();
        $result = $applicant->getNotes();
        $this->assertEquals($result, 'notes');
    }
}
