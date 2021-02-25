<?php 

class ReviewPageCest
{
    public function testReviewPageWorking(AcceptanceTester $I)
    {
        // Act
        $I->amOnPage('/index.php?action=reviews');

        // Assert
        $I->see('Review Search', 'body h1');
        $I->seeElement('input', ['value' => 'Search Reviews']);
    }
}
