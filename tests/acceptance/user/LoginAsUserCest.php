<?php 

class LoginAsUserCest
{
    public function testLoginAsUserWorking(AcceptanceTester $I)
    {
        // Arrange
        $I->amOnPage('/index.php?action=login');

        // Act
        $I->fillField(['name' => 'username'], 'Bob');
        $I->fillField(['name' => 'password'], 'pass');
        $I->click('Login');

        // Assert
        $I->amOnPage('/index.php?action=reviews');
        $I->see('new review form', 'a');

        $I->seeLink('New Review Form');
    }
}
