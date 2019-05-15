<?php
/**
 * Created by PhpStorm.
 * User: academy
 * Date: 2019-05-15
 * Time: 10:08
 */

namespace Tests\Factories;

use PHPUnit\Framework\TestCase;

use Portal\Factories\GetApplicantControllerFactory;
use Portal\Models\ApplicationFormModel;
use Psr\Container\ContainerInterface;


class GetApplicantControllerFactoryTest extends TestCase
{
    function testInvoke()
    {
        $container = $this->createMock(ContainerInterface::class);
        $applicationForm = $this->createMock(ApplicantModel::class);
        $container->method('get')
            ->willReturn($applicationForm);

        $factory = new GetApplicantControllerFactory();
        $case = $factory($container);
        $expected = GetApplicantControllerFactory::class;
        $this->assertInstanceOf($expected, $case);
    }
}
