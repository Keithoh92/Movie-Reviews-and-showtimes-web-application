<?php 

class AdminCanReadResultsFromDatabaseCest
{
    public function AdminCanReadAllMovieResultsFromDatabase(AcceptanceTester $I)
    {
        // Arrange
        $I->amOnPage('/index.php?action=login');
        $I->fillField(['name' => 'username'], 'admin');
        $I->fillField(['name' => 'password'], 'admin');
        $I->click('Login');

        // Act
        $I->amOnPage('/index.php?action=admin');
        $I->click('Show Movies');

        // Assert
        $I->see('All Movies', 'body h1');
        $I->seeNumberOfElements('tr', 11);
    }

    public function AdminCanReadAllCinemaResultsFromDatabase(AcceptanceTester $I)
    {
        // Arrange
        $I->amOnPage('/index.php?action=login');
        $I->fillField(['name' => 'username'], 'admin');
        $I->fillField(['name' => 'password'], 'admin');
        $I->click('Login');

        // Act
        $I->amOnPage('/index.php?action=admin');
        $I->click('Show Cinemas');

        // Assert
        $I->see('All Cinemas', 'body h1');
        $I->seeNumberOfElements('tr', 11);
    }

    public function AdminCanReadAllUserResultsFromDatabase(AcceptanceTester $I)
    {
        // Arrange
        $I->amOnPage('/index.php?action=login');
        $I->fillField(['name' => 'username'], 'admin');
        $I->fillField(['name' => 'password'], 'admin');
        $I->click('Login');

        // Act
        $I->amOnPage('/index.php?action=admin');
        $I->click('Show Users');

        // Assert
        $I->see('All Users', 'body h1');
        $I->seeNumberOfElements('tr', 11);
    }

    public function AdminCanReadAllReviewResultsFromDatabase(AcceptanceTester $I)
    {
        // Arrange
        $I->amOnPage('/index.php?action=login');
        $I->fillField(['name' => 'username'], 'admin');
        $I->fillField(['name' => 'password'], 'admin');
        $I->click('Login');

        // Act
        $I->amOnPage('/index.php?action=admin');
        $I->click('Show Reviews');

        // Assert
        $I->see('All Reviews', 'body h1');
        $I->seeNumberOfElements('tr', 6);
    }

    public function AdminCanReadAllShowtimeResultsFromDatabase(AcceptanceTester $I)
    {
        // Arrange
        $I->amOnPage('/index.php?action=login');
        $I->fillField(['name' => 'username'], 'admin');
        $I->fillField(['name' => 'password'], 'admin');
        $I->click('Login');

        // Act
        $I->amOnPage('/index.php?action=admin');
        $I->click('Show ShowTimes');

        // Assert
        $I->see('All Show Times', 'body h1');
        $I->seeNumberOfElements('tr', 12);
    }
}
