<?php

namespace Tests\Validators;

use Portal\Validators\ApplicantValidator;
use Tests\TestCase;

class ApplicantValidatorTest extends TestCase
{
    public function testValidate()
    {
        $this->markTestSkipped('Cannot unit test as method calls other methods');
    }

    public function testValidateAdditionalFields()
    {
        $this->markTestSkipped('Cannot unit test as method calls other methods');
    }

    /**
     * @doesNotPerformAssertions
     */
    public function testValidateFeePaymentMethods_successNoExplicitFee()
    {
        ApplicantValidator::validateFeePaymentMethods([
            'upfront' => 2000,
            'edaid' => 3000,
            'diversitech' => 2000,
            'fee' => 0
        ]);
    }

    /**
     * @doesNotPerformAssertions
     */
    public function testValidateFeePaymentMethods_successWithExplicitFee()
    {
        ApplicantValidator::validateFeePaymentMethods([
            'upfront' => 5000,
            'edaid' => 500,
            'diversitech' => 2000,
            'fee' => 8000
        ]);
    }

    public function testValidateFeePaymentMethods_failureMoreThanAcademyPrice()
    {
        $this->expectExceptionMessage('Total payment is more than course price');
        ApplicantValidator::validateFeePaymentMethods([
            'upfront' => 5000,
            'diversitech' => 5000,
            'edaid' => 5000,
            'fee' => 0
        ]);
    }

    public function testValidateFeePaymentMethods_failureMoreThanApplicantFee()
    {
        $this->expectExceptionMessage('Total payment is more than course price');
        ApplicantValidator::validateFeePaymentMethods([
            'upfront' => 5000,
            'diversitech' => 100,
            'edaid' => 3000,
            'fee' => 7000,
        ]);
    }

    public function testValidateFeePaymentMethods_failureWrongFieldTypeUpfront()
    {
        $this->expectExceptionMessage('Applicant field \'upfront\' is not a numeric type');
        ApplicantValidator::validateFeePaymentMethods([
            'upfront' => [], 'diversitech' => 0, 'edaid' => 0, 'fee' => 0
        ]);
    }

    public function testValidateFeePaymentMethods_failureWrongFieldTypeDiversitech()
    {
        $this->expectExceptionMessage('Applicant field \'diversitech\' is not a numeric type');
        ApplicantValidator::validateFeePaymentMethods([
            'upfront' => 0, 'diversitech' => [], 'edaid' => 0, 'fee' => 0
        ]);
    }

    public function testValidateFeePaymentMethods_failureWrongFieldTypeEdaid()
    {
        $this->expectExceptionMessage('Applicant field \'edaid\' is not a numeric type');
        ApplicantValidator::validateFeePaymentMethods([
            'upfront' => 0, 'diversitech' => 0, 'edaid' => [], 'fee' => 0
        ]);
    }

    public function testValidateFeePaymentMethods_failureWrongFieldTypeFee()
    {
        $this->expectExceptionMessage('Applicant field \'fee\' is not a numeric type');
        ApplicantValidator::validateFeePaymentMethods([
            'upfront' => 0, 'diversitech' => 0, 'edaid' => 0, 'fee' => []
        ]);
    }

    public function testValidateLaptop_success0()
    {
        $this->assertSame(ApplicantValidator::validateLaptop(['laptop' => 0]), true);
    }

    public function testValidateLaptop_success1()
    {
        $this->assertSame(ApplicantValidator::validateLaptop(['laptop' => 1]), true);
    }

    public function testValidateLaptop_successEmpty()
    {
        $this->assertSame(ApplicantValidator::validateLaptop(['laptop' => []]), true);
    }

    public function testValidateLaptop_failureNot0Or1OrEmpty()
    {
        $this->assertSame(ApplicantValidator::validateLaptop(['laptop' => 2]), false);
    }

    public function testValidateLaptop_failureWrongFieldType()
    {
        $this->assertSame(ApplicantValidator::validateLaptop(['laptop' => ['woof']]), false);
    }

    public function testValidateGithubUsername_successEmpty()
    {
        $this->assertSame(ApplicantValidator::validateGithubUsername(
            ['githubUsername' => []]
        ), true);
    }

    public function testValidateGithubUsername_successCorrectLength()
    {
        $this->assertSame(ApplicantValidator::validateGithubUsername(
            ['githubUsername' => 'nifty']
        ), true);
    }

    public function testValidateGithubUsername_failureTooLong()
    {
        $this->expectExceptionMessage(
            'You have either not inputted any information for githubUsername or ' . '
            it exceeds our character limits'
        );
        ApplicantValidator::validateGithubUsername(
            ['githubUsername' =>
             'qwuiofuwkdyjsdkuysdgfusydgfusdygfsdfyugsdufyg' .
             'qiwugfuwehdbsudfybiqwdbzjvbhcdvguefghoi4987y8327' .
             'vjchxbvjxchbcaksfuhvvdwq9qiuyev092813fccsdcxsavb' .
             'qwet8uygf86tv98u98fqy76qdf72g3utc12rt3c1uyig487fsdt' .
             'qiwugfuwehdbsudfybiqwdbzjvbhcdvguefghoi4987y8327' .
             'vjchxbvjxchbcaksfuhvvdwq9qiuyev092813fccsdcxsavb' .
             'qwet8uygf86tv98u98fqy76qdf72g3utc12rt3c1uyig487fsdt' .
             'qiwugfuwehdbsudfybiqwdbzjvbhcdvguefghoi4987y8327' .
             'vjchxbvjxchbcaksfuhvvdwq9qiuyev092813fccsdcxsavb' .
             'qwet8uygf86tv98u98fqy76qdf72g3utc12rt3c1uyig487fsdt' .
             'vuycugvqvixcubvjhndkuiuhoiqjoiuqwebqjhwebj']
        );
    }

    public function testValidateGithubUsername_failureWrongFieldType()
    {
        $this->assertSame(
            ApplicantValidator::validateGithubUsername(
                ['githubUsername' => ['hahaha']]
            ),
            false
        );
    }
}
