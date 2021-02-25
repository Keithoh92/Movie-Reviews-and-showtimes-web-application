<?php

use Codeception\Test\Unit;
use TuDublin\User;

class UserWithProviderTest extends Unit
{
    /**
     * @dataProvider providerIdData
     * @param $id
     * @param $expectedResult
     */
    public function testGetSetIdWithProvider($id, $expectedResult)
    {
        // arrange
        $user = new User();

        // act
        $user->setId($id);
        $result = $user->getId();

        // assert
        $this->assertEquals($expectedResult, $result);
    }

    public function providerIdData()
    {
        return [
            [0,null],
            [1,1],
            [999999,999999],
            [1000000,null],
            ['text', null]
        ];
    }

    /**
     * @dataProvider providerUsernameData
     * @param $username
     * @param $expectedResult
     */
    public function testGetSetUsernameWithProvider($username, $expectedResult)
    {
        // arrange
        $user = new User();

        // act
        $user->setUsername($username);
        $result = $user->getUsername();

        // assert
        $this->assertEquals($expectedResult, $result);
    }

    public function providerUsernameData()
    {
        return [
            ['',null],              // empty
            ['abc',null],           // below minimum of 4
            ['four','four'],
            ['fortyFiveCharacterLongMaximumLengthStringTest','fortyFiveCharacterLongMaximumLengthStringTest'],
            ['fortySixCharacterOverMaximumLengthStringTest46',null],
            [1, null]
        ];
    }

    /**
     * @dataProvider providerPasswordData
     * @param $password
     * @param $expectedResult
     */
    public function testGetSetPasswordWithProvider($password, $expectedResult)
    {
        // arrange
        $user = new User();

        // act
        $user->setPassword($password);
        $result = $user->getPassword();

        // assert
        $this->assertEquals($expectedResult, $result);
    }

    public function providerPasswordData()
    {
        $twentyFiveLetters = 'abcdefghijklmnopqrstuvwxy';
        $twoHundredFiftyCharacters = str_repeat($twentyFiveLetters,10);

        return [
            ['',null],              // empty
            ['abc',null],           // below minimum of 4
            ['four','four'],        // minimum
            [$twoHundredFiftyCharacters . 'abcde',$twoHundredFiftyCharacters . 'abcde'],  // maximum
            [$twoHundredFiftyCharacters . 'abcdef',null],    // above maximum
            [1, null]
        ];
    }

    /**
     * @dataProvider providerTypeData
     * @param $type
     * @param $expectedResult
     */
    public function testGetSetTypeWithProvider($type, $expectedResult)
    {
        // arrange
        $user = new User();

        // act
        $user->setType($type);
        $result = $user->getType();

        // assert
        $this->assertEquals($expectedResult, $result);
    }

    public function providerTypeData()
    {
        return [
            ['',null],              // empty
            ['a','a'],
            ['fortyFiveCharacterLongMaximumLengthStringTest','fortyFiveCharacterLongMaximumLengthStringTest'],
            ['fortySixCharacterOverMaximumLengthStringTest46',null],
            [1, null]
        ];
    }

    /**
     * @dataProvider providerEmailData
     * @param $email
     * @param $expectedResult
     */
    public function testGetSetEmailWithProvider($email, $expectedResult)
    {
        // arrange
        $user = new User();

        // act
        $user->setEmail($email);
        $result = $user->getEmail();

        // assert
        $this->assertEquals($expectedResult, $result);
    }

    public function providerEmailData()
    {
        return [
            ['',null],              // empty
            ['a','a'],
            ['fortyFiveCharacterLongMaximumLengthStringTest','fortyFiveCharacterLongMaximumLengthStringTest'],
            ['fortySixCharacterOverMaximumLengthStringTest46',null],
            [1, null]
        ];
    }
}