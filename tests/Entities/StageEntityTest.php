<?php

namespace Tests\Entities;

use Portal\Entities\StageEntity;
use \Exception;
use PHPUnit\Framework\TestCase;
use TypeError;

class StageEntityTest extends TestCase
{
    /**
     * Checks if StageEntity creates an instance of the StageEntityClass
     */
    public function testNewStageEntitySuccess()
    {
        $newStageEntity = new StageEntity(
            1,
            'newStage',
            2
        );
        $this->assertInstanceOf(StageEntity::class, $newStageEntity);
    }

    /**
     * Checks if id can successfully be got from the StageEntity
     */
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

    /**
     * Checks if title can successfully be got from the StageEntity
     */
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

    /**
     * Checks if order can successfully be got from the StageEntity
     */
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
