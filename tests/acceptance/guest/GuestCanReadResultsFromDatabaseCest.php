<?php 

class GuestCanReadResultsFromDatabaseCest
{
    public function GuestCanReadMovieResultsFromDatabase(AcceptanceTester $I)
    {
        // Arrange

        // Act
        $I->amOnPage('/index.php?action=movies');
        $I->click('Search Movies');

        // Assert
        $I->see('Movie Search Results', 'body h1');
        $I->seeNumberOfElements('tr', 12);
    }

    public function GuestCanReadReviewResultsFromDatabase(AcceptanceTester $I)
    {
        // Arrange

        // Act
        $I->amOnPage('/index.php?action=reviews');
        $I->click('Search Reviews');

        // Assert
        $I->see('Review Results', 'body h1');
        $I->seeNumberOfElements('tr', 6);
    }
}
