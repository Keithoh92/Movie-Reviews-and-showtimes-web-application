<?php

use Codeception\Example;

class GuestViewOfMainPagesWithProviderCest
{
    /**
     * @dataprovider _providerUrlTextData
     * @param AcceptanceTester  $I
     * @param Example           $example
     */
    public function GuestViewOfMainPagesWithProvider(AcceptanceTester $I, Example $example)
    {
        // Act
        $I->amOnPage($example['url']);

        // Assert
        $I->see($example['pageTitle'], 'body h1');
        $I->dontSee($example['text']);
    }

    /**
     * @return array
     */
    public function _providerUrlTextData()
    {
        return [
            ['url' => "/", 'pageTitle' => "Movie Search", 'text' => "Welcome"],
            ['url' => "/index.php?action=reviews", 'pageTitle' => "Review Search", 'text' => "Welcome"],
            ['url' => "/index.php?action=login", 'pageTitle' => "Login", 'text' => "Welcome"],
            ['url' => "/index.php?action=Search+Movies", 'pageTitle' => "Movie Search Results", 'text' => "Welcome"],
            ['url' => "/index.php?action=Search+Reviews", 'pageTitle' => "Review Results",
                'text' => "Welcome"],
            ['url' => "/index.php?action=readReview&reviewId=14&movieTitle=Toy%20Story", 'pageTitle' => "Read Review", 'text' => "Welcome"]
        ];
    }
}
