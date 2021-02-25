<?php

class CreateRecordInDatabaseCest
{
    public function CreateNewMovieInDatabase(AcceptanceTester $I)
    {
        // Arrange
        $I->amOnPage('/index.php?action=login');
        $I->fillField(['name' => 'username'], 'admin');
        $I->fillField(['name' => 'password'], 'admin');
        $I->click('Login');
        $I->seeNumRecords(10, 'movie');

        // Act
        $I->amOnPage('/index.php?action=admin');
        $I->click('New Movie Form');
        $I->see('Create New Movie', 'body h1');
        $I->fillField(['name' => 'title'], 'Test Title');
        $I->fillField(['name' => 'genre'], 'Test Genre');
        $I->fillField(['name' => 'classification'], 'Test Classification');
        $I->selectOption('Rating:', '1 star');
        $I->click('Submit');

        // Assert
        $I->seeNumRecords(11, 'movie');
    }

    public function CreateNewCinemaInDatabase(AcceptanceTester $I)
    {
        // Arrange
        $I->amOnPage('/index.php?action=login');
        $I->fillField(['name' => 'username'], 'admin');
        $I->fillField(['name' => 'password'], 'admin');
        $I->click('Login');
        $I->seeNumRecords(10, 'cinema');

        // Act
        $I->amOnPage('/index.php?action=admin');
        $I->click('New Cinema Form');
        $I->see('Create New Cinema', 'body h1');
        $I->fillField(['name' => 'location'], 'Test Location');
        $I->fillField(['name' => 'name'], 'Test Name');
        $I->click('Submit');

        // Assert
        $I->seeNumRecords(11, 'cinema');
    }

    public function CreateNewReviewInDatabase(AcceptanceTester $I)
    {
        // Arrange
        $I->amOnPage('/index.php?action=login');
        $I->fillField(['name' => 'username'], 'admin');
        $I->fillField(['name' => 'password'], 'admin');
        $I->click('Login');
        $I->seeNumRecords(5, 'review');

        // Act
        $I->amOnPage('/index.php?action=admin');
        $I->click('New Review Form');
        $I->see('Create New Review', 'body h1');
        $I->selectOption('Movie:', 'Alien');
        $I->selectOption('Rating:', '1 star');
        $I->fillField(['name' => 'reviewTitle'], 'Test Title');
        $I->fillField(['name' => 'text'], 'Test Text');
        $I->click('Submit');

        // Assert
        $I->seeNumRecords(6, 'review');
    }

    public function CreateNewShowtimeInDatabase(AcceptanceTester $I)
    {
        // Arrange
        $I->amOnPage('/index.php?action=login');
        $I->fillField(['name' => 'username'], 'admin');
        $I->fillField(['name' => 'password'], 'admin');
        $I->click('Login');
        $I->seeNumRecords(11, 'showtime');

        // Act
        $I->amOnPage('/index.php?action=admin');
        $I->click('New Show-time Form');
        $I->see('New Show Time', 'body h1');
        $I->selectOption('Movie:', 'Alien');
        $I->selectOption('Cinema:', 'Vue Liffey Valley');
        $I->fillField(['name' => 'date'], '2019-12-25');
        $I->fillField(['name' => 'time'], '22:22');
        $I->click('Submit');

        // Assert
        $I->seeNumRecords(12, 'showtime');
    }
}
