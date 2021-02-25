<?php 

class GuestCanRegisterToCreateNewUserCest
{
    public function GuestCanCreateNewUserInDatabase(AcceptanceTester $I)
    {
        // Arrange
        $I->seeNumRecords(10, 'user');

        // Act
        $I->amOnPage('/index.php?action=login');
        $I->click('Register');
        $I->see('New User Registration', 'body h1');
        $I->fillField(['name' => 'username'], 'testUsername');
        $I->fillField(['name' => 'password1'], 'password');
        $I->fillField(['name' => 'password2'], 'password');
        $I->fillField(['name' => 'email'], 'email@email.com');
        $I->click('REGISTER');

        // Assert
        $I->seeNumRecords(11, 'user');
    }
}
