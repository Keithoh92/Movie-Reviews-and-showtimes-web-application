<?php

use TuDublin\Movie;
use Codeception\Test\Unit;

class MovieWithProviderTest extends Unit
{
    /**
     * @dataProvider providerIdData
     * @param $num1
     * @param $expectedResult
     */
    public function testGetSetIdWithProvider($num1, $expectedResult)
    {
        // arrange
        $movie = new Movie();

        // act
        $movie->setId($num1);
        $result = $movie->getId();

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
     * @dataProvider providerTitleData
     * @param $title
     * @param $expectedResult
     */
    public function testGetSetTitleWithProvider($title, $expectedResult)
    {
        // arrange
        $movie = new Movie();

        // act
        $movie->setTitle($title);
        $result = $movie->getTitle();

        // assert
        $this->assertEquals($expectedResult, $result);
    }

    public function providerTitleData()
    {
        return [
            ['',null],
            ['title','title'],
            ['ReallyReallyReallyReallyReallyReallyLongTitle','ReallyReallyReallyReallyReallyReallyLongTitle'],
            ['EvenLongerReallyReallyReallyReallyTooLongTitle',null],
        ];
    }

    /**
     * @dataProvider providerGenreData
     * @param $genre
     * @param $expectedResult
     */
    public function testGetSetGenreWithProvider($genre, $expectedResult)
    {
        // arrange
        $movie = new Movie();

        // act
        $movie->setGenre($genre);
        $result = $movie->getGenre();

        // assert
        $this->assertEquals($expectedResult, $result);
    }

    public function providerGenreData()
    {
        return [
            ['',null],
            ['genre','genre'],
            ['ReallyReallyReallyReallyReallyReallyLongGenre','ReallyReallyReallyReallyReallyReallyLongGenre'],
            ['EvenLongerReallyReallyReallyReallyTooLongGenre',null],
        ];
    }

    /**
     * @dataProvider providerClassificationData
     * @param $classification
     * @param $expectedResult
     */
    public function testGetSetClassificationWithProvider($classification, $expectedResult)
    {
        // arrange
        $movie = new Movie();

        // act
        $movie->setClassification($classification);
        $result = $movie->getClassification();

        // assert
        $this->assertEquals($expectedResult, $result);
    }

    public function providerClassificationData()
    {
        return [
            ['',null],
            ['U','U'],
            ['FortyFiveCharacterLongClassificationTestValue','FortyFiveCharacterLongClassificationTestValue'],
            ['FortySixCharacterLongClassificationTestValue46',null],
        ];
    }

    /**
     * @dataProvider providerRatingData
     * @param $rating
     * @param $expectedResult
     */
    public function testGetSetRatingWithProvider($rating, $expectedResult)
    {
        // arrange
        $movie = new Movie();

        // act
        $movie->setRating($rating);
        $result = $movie->getRating();

        // assert
        $this->assertEquals($expectedResult, $result);
    }

    public function providerRatingData()
    {
        return [
            [0,null],
            [1,1],
            [5,5],
            [6,null],
            ['text', null]
        ];
    }
}