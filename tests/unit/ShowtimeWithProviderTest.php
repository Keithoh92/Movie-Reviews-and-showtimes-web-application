<?php

use Codeception\Test\Unit;
use TuDublin\Showtime;

class ShowtimeWithProviderTest extends Unit
{
    /**
     * @dataProvider providerIdData
     * @param $id
     * @param $expectedResult
     */
    public function testGetSetIdWithProvider($id, $expectedResult)
    {
        // arrange
        $showtime = new Showtime();

        // act
        $showtime->setId($id);
        $result = $showtime->getId();

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
     * @dataProvider providerDateData
     * @param $date
     * @param $expectedResult
     */
    public function testGetSetDateWithProvider($date, $expectedResult)
    {
        // arrange
        $showtime = new Showtime();

        // act
        $showtime->setDate($date);
        $result = $showtime->getDate();

        // assert
        $this->assertEquals($expectedResult, $result);
    }

    public function providerDateData()
    {
        return [
            ['',null],
            ['2019-04-18','2019-04-18'],
            ['9999-99-99',null],
        ];
    }

    /**
     * @dataProvider providerTimeData
     * @param $time
     * @param $expectedResult
     */
    public function testGetSetTimeWithProvider($time, $expectedResult)
    {
        // arrange
        $showtime = new Showtime();

        // act
        $showtime->setTime($time);
        $result = $showtime->getTime();

        // assert
        $this->assertEquals($expectedResult, $result);
    }

    public function providerTimeData()
    {
        return [
            ['',null],
            ['00:00','00:00'],
            ['23:59','23:59'],
            ['24:00',null],
            ['23:60',null],
        ];
    }

    /**
     * @dataProvider providerCinemaIdData
     * @param $cinemaId
     * @param $expectedResult
     */
    public function testGetSetCinemaIdWithProvider($cinemaId, $expectedResult)
    {
        // arrange
        $showtime = new Showtime();

        // act
        $showtime->setCinemaId($cinemaId);
        $result = $showtime->getCinemaId();

        // assert
        $this->assertEquals($expectedResult, $result);
    }

    public function providerCinemaIdData()
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
     * @dataProvider providerMovieIdData
     * @param $movieId
     * @param $expectedResult
     */
    public function testGetSetMovieIdWithProvider($movieId, $expectedResult)
    {
        // arrange
        $showtime = new Showtime();

        // act
        $showtime->setMovieId($movieId);
        $result = $showtime->getMovieId();

        // assert
        $this->assertEquals($expectedResult, $result);
    }

    public function providerMovieIdData()
    {
        return [
            [0,null],
            [1,1],
            [999999,999999],
            [1000000,null],
            ['text', null]
        ];
    }
}