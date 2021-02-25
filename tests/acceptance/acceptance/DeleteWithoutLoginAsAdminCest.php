<?php 

class DeleteWithoutLoginAsAdminCest
{
    public function testDeleteWithoutLoginAsAdmin(AcceptanceTester $I)
    {
        // act
        $I->amOnPage('/index.php?action=deleteMovie&movieId=1');

        // assert
        $I->see('Error', 'body h1');
    }
}
