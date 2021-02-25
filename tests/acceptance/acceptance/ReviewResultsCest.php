<?php 

class ReviewResultsCest
{
    public function testReviewResultsPageWorking(AcceptanceTester $I)
    {
        // Arrange

        // Act
        $I->amOnPage('/index.php?action=Search+Reviews');

        // Assert
        $I->see('Review Results', 'body h1');
        $I->see('Movie', 'table th');
        $I->see('Genre', 'table th');
        $I->see('Classification', 'table th');
        $I->see('Movie Rating', 'table th');
        $I->see('Review Title', 'table th');
        $I->see('Reviewer', 'table th');
        $I->see('Helpfulness', 'table th');
    }
}
