<?php

use Codeception\Test\Unit;
use TuDublin\Showtime;

class ShowtimeTest extends Unit
{
    public function testCanCreateShowtimeObject()
    {
        // arrange

        // act
        $showtime = new Showtime();

        // assert
        $this->assertNotNull($showtime);
    }

    public function testGetSetId()
    {
        // arrange
        $id = 1;
        $showtime = new Showtime();
        $expectedResult = 1;

        // act
        $showtime->setId($id);
        $result = $showtime->getId();

        // assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testGetSetDate()
    {
        // arrange
        $date = '2019-04-18';
        $showtime = new Showtime();
        $expectedResult = '2019-04-18';

        // act
        $showtime->setDate($date);
        $result = $showtime->getDate();

        // assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testGetSetTime()
    {
        // arrange
        $time = '22:22';
        $showtime = new Showtime();
        $expectedResult = '22:22';

        // act
        $showtime->setTime($time);
        $result = $showtime->getTime();

        // assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testGetSetCinemaId()
    {
        // arrange
        $cinemaId = 1;
        $showtime = new Showtime();
        $expectedResult = 1;

        // act
        $showtime->setCinemaId($cinemaId);
        $result = $showtime->getCinemaId();

        // assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testGetSetMovieId()
    {
        // arrange
        $movieId = 1;
        $showtime = new Showtime();
        $expectedResult = 1;

        // act
        $showtime->setMovieId($movieId);
        $result = $showtime->getMovieId();

        // assert
        $this->assertEquals($expectedResult, $result);
    }
}