<?php
use Codeception\Test\Unit;
use TuDublin\Movie;
class MovieTest extends Unit
{
    public function testCanCreateMovieObject()
    {
        // arrange

        // act
        $movie = new Movie();

        // assert
        $this->assertNotNull($movie);
    }

    public function testGetSetId()
    {
        // arrange
        $id = 1;
        $movie = new Movie();
        $expectedResult = 1;

        // act
        $movie->setId($id);
        $result = $movie->getId();

        // assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testGetSetTitle()
    {
        // arrange
        $title = 'Some Title';
        $movie = new Movie();
        $expectedResult = 'Some Title';

        // act
        $movie->setTitle($title);
        $result = $movie->getTitle();

        // assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testGetSetGenre()
    {
        // arrange
        $genre = 'Some Genre';
        $movie = new Movie();
        $expectedResult = 'Some Genre';

        // act
        $movie->setGenre($genre);
        $result = $movie->getGenre();

        // assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testGetSetClassification()
    {
        // arrange
        $classification = 'PG';
        $movie = new Movie();
        $expectedResult = 'PG';

        // act
        $movie->setClassification($classification);
        $result = $movie->getClassification();

        // assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testGetSetRating()
    {
        // arrange
        $rating = 4;
        $movie = new Movie();
        $expectedResult = 4;

        // act
        $movie->setRating($rating);
        $result = $movie->getRating();

        // assert
        $this->assertEquals($expectedResult, $result);
    }
}