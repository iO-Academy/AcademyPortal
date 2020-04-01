<?php

namespace Tests\Entities;

use Portal\Entities\StageEntity;
use \Exception;
use PHPUnit\Framework\TestCase;
use TypeError;

class StageEntityTest extends TestCase
{
    public function testNewStageEntitySuccess()
    {
        $newStageEntity = new StageEntity(
            1,
            'newStage',
            2
        );
        $this->assertInstanceOf(StageEntity::class, $newStageEntity);
    }

    public function testGetStageIdSuccess()
    {
        $name = new StageEntity(
            1,
            'newStage',
            2
        );
        $result = $name->getStageId();
        $this->assertEquals($result, 1);
    }

    public function testGetStageTitleSuccess()
    {
        $name = new StageEntity(
            1,
            'newStage',
            2
        );
        $result = $name->getStageTitle();
        $this->assertEquals($result, 'newStage');
    }

    public function testGetStageOrderSuccess()
    {
        $name = new StageEntity(
            1,
            'newStage',
            2
        );
        $result = $name->getStageOrder();
        $this->assertEquals($result, 2);
    }
}