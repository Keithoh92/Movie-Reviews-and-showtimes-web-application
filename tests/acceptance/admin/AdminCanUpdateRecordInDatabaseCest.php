<?php 

class AdminCanUpdateRecordInDatabaseCest
{
    public function AdminCanUpdateMovieInDatabase(AcceptanceTester $I)
    {
        // Arrange
        $I->amOnPage('/index.php?action=login');
        $I->fillField(['name' => 'username'], 'admin');
        $I->fillField(['name' => 'password'], 'admin');
        $I->click('Login');

        // Act
        $I->amOnPage('/index.php?action=admin');
        $I->click('Show Movies');
        $I->amOnPage('/index.php?action=listAllMovies');
        $I->click('Edit');
        $I->amOnPage('/index.php?action=editMovieForm&movieId=1');
        $I->see('Edit Movie', 'body h1');
        $I->fillField(['name' => 'classification'], 'TestClassification');
        $I->click('Submit');

        // Assert
        $I->amOnPage('index.php?action=listAllMovies');
        $I->see('TestClassification', 'td');
    }

    public function AdminCanUpdateCinemaInDatabase(AcceptanceTester $I)
    {
        // Arrange
        $I->amOnPage('/index.php?action=login');
        $I->fillField(['name' => 'username'], 'admin');
        $I->fillField(['name' => 'password'], 'admin');
        $I->click('Login');

        // Act
        $I->amOnPage('/index.php?action=admin');
        $I->click('Show Cinemas');
        $I->amOnPage('/index.php?action=Search%20Cinemas');
        $I->click('Edit');
        $I->amOnPage('/index.php?action=editCinemaForm&cinemaId=1');
        $I->see('Edit Cinema', 'body h1');
        $I->fillField(['name' => 'location'], 'TestLocation');
        $I->click('Submit');

        // Assert
        $I->amOnPage('/index.php?action=Search%20Cinemas');
        $I->see('TestLocation', 'td');
    }

    public function AdminCanUpdateReviewInDatabase(AcceptanceTester $I)
    {
        // Arrange
        $I->amOnPage('/index.php?action=login');
        $I->fillField(['name' => 'username'], 'admin');
        $I->fillField(['name' => 'password'], 'admin');
        $I->click('Login');

        // Act
        $I->amOnPage('/index.php?action=admin');
        $I->click('Show Reviews');
        $I->amOnPage('/index.php?action=listAllReviews');
        $I->click('Edit');
        $I->amOnPage('/index.php?action=editReviewForm&reviewId=14');
        $I->see('Edit Review', 'body h1');
        $I->fillField(['name' => 'text'], 'TestText');
        $I->click('Submit');

        // Assert
        $I->amOnPage('/index.php?action=listAllReviews');
        $I->see('TestText', 'td');
    }

    public function AdminCanUpdateShowtimeInDatabase(AcceptanceTester $I)
    {
        // Arrange
        $I->amOnPage('/index.php?action=login');
        $I->fillField(['name' => 'username'], 'admin');
        $I->fillField(['name' => 'password'], 'admin');
        $I->click('Login');

        // Act
        $I->amOnPage('/index.php?action=admin');
        $I->click('Show ShowTimes');
        $I->amOnPage('/index.php?action=listShowTimes');
        $I->click('Edit');
        $I->amOnPage('/index.php?action=editShowTimeForm&showTimeId=1');
        $I->see('Edit Show Time', 'body h1');
        $I->fillField(['name' => 'date'], '2222-12-22');
        $I->click('Submit');

        // Assert
        $I->amOnPage('/index.php?action=listShowTimes');
        $I->see('2222-12-22', 'td');
    }
}
