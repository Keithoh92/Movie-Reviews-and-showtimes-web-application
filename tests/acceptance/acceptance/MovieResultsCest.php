<?php 

class MovieResultsCest
{
    public function testMovieResultsPageWorking(AcceptanceTester $I)
    {
        // Arrange

        // Act
        $I->amOnPage('/index.php?&action=Search+Movies');

        // Assert
        $I->see('Movie Search Results', 'body h1');
        $I->see('Location', 'table th');
        $I->see('Movie', 'table th');
        $I->see('Cinema', 'table th');
        $I->see('Genre', 'table th');
        $I->see('Rating', 'table th');
        $I->see('Date', 'table th');
        $I->see('Time', 'table th');
    }
}
