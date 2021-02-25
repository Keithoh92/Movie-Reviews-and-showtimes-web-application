<?php 

class LoggedInUserCanCreateNewReviewCest
{
    public function LoggedInUserCreateNewReviewInDatabase(AcceptanceTester $I)
    {
        // Arrange
        $I->amOnPage('/index.php?action=login');
        $I->fillField(['name' => 'username'], 'Bob');
        $I->fillField(['name' => 'password'], 'pass');
        $I->click('Login');
        $I->seeNumRecords(5, 'review');

        // Act
        $I->amOnPage('/index.php?action=reviews');
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
}
