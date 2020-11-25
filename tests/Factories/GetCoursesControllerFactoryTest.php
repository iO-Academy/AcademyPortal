<?php

namespace Tests\Factories;

use Tests\TestCase;
use Portal\Controllers\API\GetCoursesController;
use Portal\Factories\GetCoursesControllerFactory;
use Portal\Models\CourseModel;
use Psr\Container\ContainerInterface;

class GetCoursesControllerFactoryTest extends TestCase
{
    public function testController()
    {
        $container = $this->createMock(ContainerInterface::class);
        $courseModel = $this->createMock(CourseModel::class);
        $container->method('get')->willReturn($courseModel);
        $factory = new GetCoursesControllerFactory();

        $case = $factory($container);
        $expected = GetCoursesController::class;
        $this->assertInstanceOf($expected, $case);
    }
}
