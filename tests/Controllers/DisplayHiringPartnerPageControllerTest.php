<?php

use PHPUnit\Framework\TestCase;
use Portal\Controllers\DisplayHiringPartnerPageController;
use Portal\Models\HiringPartnerModel;

class DisplayHiringPartnerPageControllerTest extends TestCase {

    public function testSuccess()
    {
        $dog = $this->createMock(Portal\Classes\Dog::class); //blank pretend object
        $dog->method('getUrl')
            ->willReturn('www.dog.com');
        $inputDogs = [$dog];
        $dogDisplayer = new \TopDog\Classes\DogDisplayer();
        $result = $dogDisplayer->displayDogs($inputDogs);
        $stringResult = '<div class="dog-holder"><form action="post"><div class="dog-image"><img src="www.dog.com" alt="doggy"></div><input type="hidden" id="favDogId" name="favDogId" value="0"><input type="submit" value="Make favourite!"></form></div>';
        $this->assertEquals($result['dogs'], $stringResult);
    }

    public function testFailure()
    {
        $dog = $this->createMock(Portal\Classes\Dog::class); //blank pretend object
        $dog->method('getUrl')
            ->willReturn('');
        $inputDogs = [$dog];
        $dogDisplayer = new \TopDog\Classes\DogDisplayer();
        $result = $dogDisplayer->displayDogs($inputDogs);
        $stringResult = '<div class="dog-holder"><form action="post"><div class="dog-image"><img src="" alt="doggy"></div><input type="hidden" id="favDogId" name="favDogId" value="0"><input type="submit" value="Make favourite!"></form></div>';
        $this->assertEquals($result['dogs'], $stringResult);
    }

    public function testMalformed()
    {
        $dogDisplayer = new \Portal\Classes\DogDisplayer();
        $this->expectException(TypeError::class);
        $dogDisplayer->displayDogs(7);
}