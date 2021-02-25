<?php
use Codeception\Test\Unit;
use TuDublin\Cinema;

class CinemaTest extends Unit
{
    public function testCanCreateCinemaObject()
    {
        // arrange

        // act
        $cinema = new Cinema();

        // assert
        $this->assertNotNull($cinema);
    }

    public function testGetSetId()
    {
        // arrange
        $id = 1;
        $cinema = new cinema();
        $expectedResult = 1;

        // act
        $cinema->setId($id);
        $result = $cinema->getId();

        // assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testGetSetLocation()
    {
        // arrange
        $location = 'Some Location';
        $cinema = new cinema();
        $expectedResult = 'Some Location';

        // act
        $cinema->setLocation($location);
        $result = $cinema->getLocation();

        // assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testGetSetName()
    {
        // arrange
        $name = 'Some Name';
        $cinema = new cinema();
        $expectedResult = 'Some Name';

        // act
        $cinema->setName($name);
        $result = $cinema->getName();

        // assert
        $this->assertEquals($expectedResult, $result);
    }
}