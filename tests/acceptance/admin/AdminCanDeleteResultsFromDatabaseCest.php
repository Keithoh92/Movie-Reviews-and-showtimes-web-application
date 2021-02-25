<?php 

class AdminCanDeleteResultsFromDatabaseCest
{
    public function AdminCanDeleteMoviesFromDatabase(AcceptanceTester $I)
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
        $I->seeNumberOfElements('tr', 11);
        $I->click('Delete');
        $I->seeNumberOfElements('tr', 10);
    }

    public function AdminCanDeleteCinemasFromDatabase(AcceptanceTester $I)
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
        $I->seeNumberOfElements('tr', 11);
        $I->click('Delete');
        $I->seeNumberOfElements('tr', 10);
    }

    public function AdminCanDeleteUsersFromDatabase(AcceptanceTester $I)
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
        $I->seeNumberOfElements('tr', 11);
        $I->click('Delete');
        $I->seeNumberOfElements('tr', 10);
    }

    public function AdminCanDeleteReviewsFromDatabase(AcceptanceTester $I)
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
        $I->seeNumberOfElements('tr', 6);
        $I->click('Delete');
        $I->seeNumberOfElements('tr', 5);
    }

    public function AdminCanDeleteShowTimesFromDatabase(AcceptanceTester $I)
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
        $I->seeNumberOfElements('tr', 12);
        $I->click('Delete');
        $I->seeNumberOfElements('tr', 11);
    }
}
