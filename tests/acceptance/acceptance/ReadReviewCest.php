<?php 

class ReadReviewCest
{
    public function testReadReviewPageWorking(AcceptanceTester $I)
    {
        // Act
        $I->amOnPage('/index.php?action=Search+Reviews');
        $I->click('Read');

        // Assert
        $I->see('Read Review', 'body h1');
        $I->see('Back to Review Results', 'button');
        $I->see('Movie', 'label');
        $I->see('Rating', 'label');
        $I->see('Helpfulness', 'label');
        $I->seeElement('label', ['for' => 'reviewRating']);
        $I->seeElement('select', ['name' => 'helpfulness']);
        $I->seeElement('input', ['value' => 'Rate Review']);
    }
}
