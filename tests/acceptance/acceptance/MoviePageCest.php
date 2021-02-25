<?php 

class MoviePageCest
{
    public function testMoviePageWorking(AcceptanceTester $I)
    {
        // Act
        $I->amOnPage('/');

        // Assert
        $I->see('Movie Search', 'body h1');
        $I->seeElement('input', ['value' => 'Search Movies']);
        $I->see('Advanced Search');
    }
}
