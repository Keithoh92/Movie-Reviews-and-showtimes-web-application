<?php
use Codeception\Test\Unit;
use TuDublin\Review;

class ReviewTest extends Unit
{
    public function testCanCreateReviewObject()
    {
        // arrange

        // act
        $review = new Review();

        // assert
        $this->assertNotNull($review);
    }

    public function testCanUpdateHelpfulness()
    {
        // arrange
        $initialRatingCount = 1;
        $initialHelpfulnessValue = 3;
        $passedInHelpfulnessValue = 5;
        $expectedHelpfulnessValue = 4;
        $review = new Review();

        // act
        $review->setRatingCount($initialRatingCount);
        $review->setHelpfulness($initialHelpfulnessValue);
        $review->updateHelpfulness($passedInHelpfulnessValue);
        $helpfulnessResult = $review->getHelpfulness();

        // assert
        $this->assertEquals($expectedHelpfulnessValue, $helpfulnessResult);
    }

    public function testGetSetId()
    {
        // arrange
        $id = 1;
        $review = new Review();
        $expectedResult = 1;

        // act
        $review->setId($id);
        $result = $review->getId();

        // assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testGetSetHelpfulness()
    {
        // arrange
        $helpfulness = 2;
        $review = new Review();
        $expectedResult = 2;

        // act
        $review->setHelpfulness($helpfulness);
        $result = $review->getHelpfulness();

        // assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testGetSetReviewTitle()
    {
        // arrange
        $reviewTitle = 'Some Title';
        $review = new Review();
        $expectedResult = 'Some Title';

        // act
        $review->setReviewTitle($reviewTitle);
        $result = $review->getReviewTitle();

        // assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testGetSetText()
    {
        // arrange
        $text = 'Some Text';
        $review = new Review();
        $expectedResult = 'Some Text';

        // act
        $review->setText($text);
        $result = $review->getText();

        // assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testGetSetUserId()
    {
        // arrange
        $userId = 1;
        $review = new Review();
        $expectedResult = 1;

        // act
        $review->setUserId($userId);
        $result = $review->getUserId();

        // assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testGetSetMovieId()
    {
        // arrange
        $movieId = 1;
        $review = new Review();
        $expectedResult = 1;

        // act
        $review->setMovieId($movieId);
        $result = $review->getMovieId();

        // assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testGetSetRatingCount()
    {
        // arrange
        $ratingCount = 1;
        $review = new Review();
        $expectedResult = 1;

        // act
        $review->setRatingCount($ratingCount);
        $result = $review->getRatingCount();

        // assert
        $this->assertEquals($expectedResult, $result);
    }
}