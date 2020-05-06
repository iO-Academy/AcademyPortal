<?php

namespace Tests\Entities;

use Portal\Entities\StageEntity;
use PHPUnit\Framework\TestCase;

class StageEntityTest extends TestCase
{
    /**
     * Checks if StageEntity creates an instance of the StageEntityClass
     */
    public function testNewStageEntitySuccess()
    {
        $newStageEntity = new StageEntity(
            'newStage',
            2
        );
        $this->assertInstanceOf(StageEntity::class, $newStageEntity);
    }

    /**
     * Checks if title can successfully be got from the StageEntity
     */
    public function testGetStageTitleSuccess()
    {
        $name = new StageEntity(
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
            'newStage',
            2
        );
        $result = $name->getStageOrder();
        $this->assertEquals($result, 2);
    }

    /**
     * Checks if deleted can successfully be got from the StageEntity
     */
    public function testGetStageDeletedSuccess()
    {
        $name = new StageEntity(
            'newStage',
            2
        );
        $result = $name->getStageDeleted();
        $this->assertEquals($result, 0);
    }
}