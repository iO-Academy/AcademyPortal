<?php

namespace Tests\Entities;

use Portal\Entities\EventEntity;
use \Exception;
use Tests\TestCase;
use TypeError;

class EventEntityTest extends TestCase
{
    public function testGetEventIdSuccess()
    {
        $name = new EventEntity(
            1,
            'hiring event',
            2,
            '1 Widcombe Cres, Bath BA2 6AH',
            '2019-10-04',
            '18:00',
            '21:00',
            '',
            0
        );
        $result = $name->getEventId();
        $this->assertEquals($result, 1);
    }

    public function testGetEventNameSuccess()
    {
        $name = new EventEntity(
            1,
            'hiring event',
            2,
            '1 Widcombe Cres, Bath BA2 6AH',
            '2019-10-04',
            '18:00',
            '21:00',
            '',
            0
        );
        $result = $name->getName();
        $this->assertEquals($result, 'hiring event');
    }

    public function testGetCategorySuccess()
    {
        $name = new EventEntity(
            1,
            'hiring event',
            2,
            '1 Widcombe Cres, Bath BA2 6AH',
            '1970-01-01',
            '12:34',
            '16:00',
            '',
            0
        );
        $result = $name->getCategory();
        $this->assertEquals($result, 2);
    }

    public function testGetLocationSuccess()
    {
        $name = new EventEntity(
            1,
            'Taster Session',
            2,
            '1 Widcombe Cres, Bath BA2 6AH',
            '2019-10-02',
            '18:00',
            '21:00',
            'notes',
            0
        );
        $result = $name->getLocation();
        $this->assertEquals($result, '1 Widcombe Cres, Bath BA2 6AH');
    }

    public function testGetDateSuccess()
    {
        $name = new EventEntity(
            1,
            'hiring event',
            2,
            '1 Widcombe Cres, Bath BA2 6AH',
            '2019-10-02',
            '18:00',
            '21:00',
            'notes',
            0
        );
        $result = $name->getDate();
        $this->assertEquals($result, '2019-10-02');
    }

    public function testGetStartTimeSuccess()
    {
        $name = new EventEntity(
            1,
            'Misc Event',
            2,
            '1 Widcombe Cres, Bath BA2 6AH',
            '2019-10-02',
            '18:00',
            '21:00',
            'notes',
            0
        );
        $result = $name->getStartTime();
        $this->assertEquals($result, '18:00');
    }

    public function testGetEndTimeSuccess()
    {
        $name = new EventEntity(
            1,
            'hiring event',
            2,
            '1 Widcombe Cres, Bath BA2 6AH',
            '2019-10-02',
            '18:34',
            '21:00',
            '',
            0
        );
        $result = $name->getEndTime();
        $this->assertEquals($result, '21:00');
    }

    public function testGetNotesSuccess()
    {
        $name = new EventEntity(
            1,
            'hiring event',
            2,
            '1 Widcombe Cres, Bath BA2 6AH',
            '2019-10-02',
            '18:00',
            '21:00',
            'notes',
            0
        );
        $result = $name->getNotes();
        $this->assertEquals($result, 'notes');
    }

    public function testNewEventEntitySuccess()
    {
        $newEventEntity = new EventEntity(
            1,
            'new event',
            2,
            '1 widcomb',
            '2019-01-01',
            "12:00",
            "14:00",
            '',
            0
        );
        $this->assertInstanceOf(EventEntity::class, $newEventEntity);
    }

    public function testGetAvailableToHPSuccess()
    {
        $name = new EventEntity(
            1,
            'hiring event',
            2,
            '1 Widcombe Cres, Bath BA2 6AH',
            '2019-10-02',
            '18:00',
            '21:00',
            'notes',
            0
        );
        $result = $name->getAvailableToHP();
        $this->assertEquals($result, 0);
    }

    public function testConstructorFailure()
    {
        $this->expectException(Exception::class);
        new EventEntity(
            1,
            'hiring eventhhhhfhfgsgshshshshshhshshshshhshshshjakhdkahfksdhflsahfkhaslfkhskfhlkhfklahfdfkhgkaldhfsf
            ghdkfhgkdjfhgkadhglkjadfghkldfjhfgksdhgkljashglkashdgklahsdfglkjhaklghaskjghaskjhgdkasdhgkjhgkajhagdff
            mhetjuertuergthjergtjerhwgtjehwrgtjewrgtjkewrgtjehrgtjkehgrytwerdgfdg',
            2,
            '1 Widcombe Cres, Bath BA2 6AH',
            '2019-10-02',
            '18:00',
            '21:00',
            'notes',
            0
        );
    }

    public function testMandatoryFieldsOnlySuccess()
    {
        $actual = new EventEntity(
            1,
            'hiring event',
            2,
            '1 Widcombe Cres, Bath BA2 6AH',
            '2019-10-02',
            '18:00',
            '21:00'
        );
        $this->assertInstanceOf(EventEntity::class, $actual);
    }
}
