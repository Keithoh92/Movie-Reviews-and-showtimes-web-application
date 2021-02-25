<?php 

class LoginPageCest
{
    public function testLoginPageWorking(AcceptanceTester $I)
    {
        // Act
        $I->amOnPage('/index.php?action=login');

        // Assert
        $I->see('Username:', 'body label');
        $I->see('Password:', 'body label');
        $I->seeElement('input', ['value' => 'Login']);
        $I->seeLink('Register');
    }

    public function testLinkToRegistrationPageWorking(AcceptanceTester $I)
    {
        // Act
        $I->amOnPage('/index.php?action=login');
        $I->click('Register');

        // Assert
        $I->amOnPage('/index.php?action=newUserForm');
        $I->see('Registration', 'h1');
    }
}
