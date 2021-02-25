<?php
use Codeception\Test\Unit;
use TuDublin\Cinema;

class CinemaWithProviderTest extends Unit
{
    /**
     * @dataProvider providerIdData
     * @param $id
     * @param $expectedResult
     */
    public function testGetSetIdWithProvider($id, $expectedResult)
    {
        // arrange
        $cinema = new cinema();

        // act
        $cinema->setId($id);
        $result = $cinema->getId();

        // assert
        $this->assertEquals($expectedResult, $result);
    }

    public function providerIdData()
    {
        return [
            [0,null],
            [1,1],
            [999999,999999],
            [1000000,null],
            ['text', null]
        ];
    }

    /**
     * @dataProvider providerLocationData
     * @param $location
     * @param $expectedResult
     */
    public function testGetSetLocationWithProvider($location, $expectedResult)
    {
        // arrange
        $cinema = new cinema();

        // act
        $cinema->setLocation($location);
        $result = $cinema->getLocation();

        // assert
        $this->assertEquals($expectedResult, $result);
    }

    public function providerLocationData()
    {
        return [
            ['',null],
            ['L','L'],
            ['FortyFiveCharacterLongLocationGetSetTestValue','FortyFiveCharacterLongLocationGetSetTestValue'],
            ['FortySixCharacterLongLocationGetSetTestValue46',null]
        ];
    }

    /**
     * @dataProvider providerNameData
     * @param $name
     * @param $expectedResult
     */
    public function testGetSetNameWithProvider($name, $expectedResult)
    {
        // arrange
        $cinema = new cinema();

        // act
        $cinema->setName($name);
        $result = $cinema->getName();

        // assert
        $this->assertEquals($expectedResult, $result);
    }

    public function providerNameData()
    {
        return [
            ['',null],
            ['N','N'],
            ['FortyFiveCharacterLongNameGetSetTestValueName','FortyFiveCharacterLongNameGetSetTestValueName'],
            ['FortySixCharacterLongNameGetSetTestValueName46',null]
        ];
    }
}