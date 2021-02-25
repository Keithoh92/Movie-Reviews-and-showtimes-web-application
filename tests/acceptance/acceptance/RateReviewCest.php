<?php 

class RateReviewCest
{
    public function testRateReviewActionWorking(AcceptanceTester $I)
    {
        // Arrange
        $I->amOnPage('/index.php?action=Search+Reviews');

        // Act
        $I->click('Read');

        // Assert
        $I->see('Read Review', 'body h1');

        // Act
        $I->selectOption('form select[name=helpfulness]', ['value' => '4']);
        $I->click('Rate Review');

        // Assert
        $I->seeInCurrentUrl('Rate+Review');
        $I->amOnPage('/index.php?helpfulness=4&action=Rate+Review&reviewId=17');
        $I->see('Message Page', 'h1');
        $I->see('Thank you for your vote!', 'p');
    }
}
