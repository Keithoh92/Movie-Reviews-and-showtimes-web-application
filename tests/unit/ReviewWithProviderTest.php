<?php
use Codeception\Test\Unit;
use TuDublin\Review;

class ReviewWithProviderTest extends Unit
{
    /**
     * @dataProvider providerUpdateHelpfulnessData
     * @param $initialRatingCount
     * @param $initialHelpfulnessValue
     * @param $passedInHelpfulnessValue
     * @param $expectedHelpfulnessValue
     */
    public function testCanUpdateHelpfulnessWithProvider($initialRatingCount, $initialHelpfulnessValue,
                                             $passedInHelpfulnessValue, $expectedHelpfulnessValue)
    {
        // arrange
        $review = new Review();

        // act
        $review->setRatingCount($initialRatingCount);
        $review->setHelpfulness($initialHelpfulnessValue);
        $review->updateHelpfulness($passedInHelpfulnessValue);
        $helpfulnessResult = $review->getHelpfulness();

        // assert
        $this->assertEquals($expectedHelpfulnessValue, $helpfulnessResult);
    }

    public function providerUpdateHelpfulnessData()
    {
        return [
            [0,0,0,null],
            [0,0,1,1],
            [1,1,1,1],
            [1,5,1,3],
            [1,1,6,1],
            [999999,5,5,5],
            [999999,5,6,5],
            [0,0,'text', 0]
        ];
    }

    /**
     * @dataProvider providerIdData
     * @param $id
     * @param $expectedResult
     */
    public function testGetSetIdWithProvider($id, $expectedResult)
    {
        // arrange
        $review = new Review();

        // act
        $review->setId($id);
        $result = $review->getId();

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
     * @dataProvider providerHelpfulnessData
     * @param $helpfulness
     * @param $expectedResult
     */
    public function testGetSetHelpfulnessWithProvider($helpfulness, $expectedResult)
    {
        // arrange
        $review = new Review();

        // act
        $review->setHelpfulness($helpfulness);
        $result = $review->getHelpfulness();

        // assert
        $this->assertEquals($expectedResult, $result);
    }

    public function providerHelpfulnessData()
    {
        return [
            [0,null],
            [1,1],
            [5,5],
            [6,null],
            ['text', null]
        ];
    }

    /**
     * @dataProvider providerReviewTitleData
     * @param $reviewTitle
     * @param $expectedResult
     */
    public function testGetSetReviewTitleWithProvider($reviewTitle, $expectedResult)
    {
        // arrange
        $review = new Review();

        // act
        $review->setReviewTitle($reviewTitle);
        $result = $review->getReviewTitle();

        // assert
        $this->assertEquals($expectedResult, $result);
    }

    public function providerReviewTitleData()
    {
        return [
            ['',null],
            ['L','L'],
            ['TwentyFiveCharacterLong25','TwentyFiveCharacterLong25'],
            ['TwentySixCharacterLonger26',null]
        ];
    }

    /**
     * @dataProvider providerTextData
     * @param $text
     * @param $expectedResult
     */
    public function testGetSetTextWithProvider($text, $expectedResult)
    {
        // arrange
        $review = new Review();

        // act
        $review->setText($text);
        $result = $review->getText();

        // assert
        $this->assertEquals($expectedResult, $result);
    }

    public function providerTextData()
    {
        $twentyFiveLetters = 'abcdefghijklmnopqrstuvwxy';
        $oneThousandCharacterString = str_repeat($twentyFiveLetters,40);

        return [
            ['',null],
            ['T','T'],
            [$oneThousandCharacterString,$oneThousandCharacterString],
            [$oneThousandCharacterString . 'z',null]
        ];
    }

    /**
     * @dataProvider providerUserIdData
     * @param $userId
     * @param $expectedResult
     */
    public function testGetSetUserIdWithProvider($userId, $expectedResult)
    {
        // arrange
        $review = new Review();

        // act
        $review->setUserId($userId);
        $result = $review->getUserId();

        // assert
        $this->assertEquals($expectedResult, $result);
    }

    public function providerUserIdData()
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
        $review = new Review();

        // act
        $review->setMovieId($movieId);
        $result = $review->getMovieId();

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

    /**
     * @dataProvider providerRatingCountData
     * @param $ratingCount
     * @param $expectedResult
     */
    public function testGetSetRatingCountWithProvider($ratingCount, $expectedResult)
    {
        // arrange
        $review = new Review();

        // act
        $review->setRatingCount($ratingCount);
        $result = $review->getRatingCount();

        // assert
        $this->assertEquals($expectedResult, $result);
    }

    public function providerRatingCountData()
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