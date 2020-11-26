<?php

namespace Tests\Factories;

use Psr\Container\ContainerInterface;
use Slim\Views\PhpRenderer;
use Tests\TestCase;
use Portal\Controllers\Frontend\DisplayCoursesController;
use Portal\Factories\DisplayCoursesControllerFactory;
use Portal\Models\CourseModel;

class DisplayCoursesControllerFactoryTest extends TestCase
{
    public function testDisplayCoursesControllerFactory()
    {
        $container = $this->createMock(ContainerInterface::class);
        $renderer = $this->createMock(PhpRenderer::class);
        $model = $this->createMock(CourseModel::class);

        //best solution is to use prophecy but this works. Do not mess with order in factory
        $container->expects($this->at(0))->method('get')
            ->with($this->equalTo('renderer'))
            ->willReturn($renderer);

        $container->expects($this->at(1))->method('get')
            ->with($this->equalTo('CourseModel'))
            ->willReturn($model);

        $factory = new DisplayCoursesControllerFactory();
        $case = $factory($container);
        $expected = DisplayCoursesController::class;
        $this->assertInstanceOf($expected, $case);
    }
}
