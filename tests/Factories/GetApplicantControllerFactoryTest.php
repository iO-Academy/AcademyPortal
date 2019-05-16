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
use Portal\Models\ApplicantModel;
use Portal\Controllers\GetApplicantController;
use Psr\Container\ContainerInterface;


class GetApplicantControllerFactoryTest extends TestCase
{
    function testInvoke()
    {
        $container = $this->createMock(ContainerInterface::class);
        $applicationModel = $this->createMock(ApplicantModel::class);
        $container->method('get')
            ->willReturn($applicationModel);

        $factory = new GetApplicantControllerFactory();
        $case = $factory($container);
        $expected = GetApplicantController::class;
        $this->assertInstanceOf($expected, $case);
    }
}
