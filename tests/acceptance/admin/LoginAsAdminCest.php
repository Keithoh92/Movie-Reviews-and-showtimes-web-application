<?php 

class LoginAsAdminCest
{
    public function testLoginAsAdminWorking(AcceptanceTester $I)
    {
        // Arrange
        $I->amOnPage('/index.php?action=login');

        // Act
        $I->fillField(['name' => 'username'], 'admin');
        $I->fillField(['name' => 'password'], 'admin');
        $I->click('Login');

        // Assert
        $I->amOnPage('/index.php?action=admin');
        $I->seeLink('New Movie Form');
    }
}
