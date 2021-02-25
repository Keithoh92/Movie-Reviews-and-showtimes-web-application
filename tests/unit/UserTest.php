<?php

use Codeception\Test\Unit;
use TuDublin\User;

class UserTest extends Unit
{
    public function testCanCreateUserObject()
    {
        // arrange

        // act
        $user = new User();

        // assert
        $this->assertNotNull($user);
    }

    public function testGetSetId()
    {
        // arrange
        $id = 1;
        $user = new User();
        $expectedResult = 1;

        // act
        $user->setId($id);
        $result = $user->getId();

        // assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testGetSetUsername()
    {
        // arrange
        $username = 'SomeUser';
        $user = new User();
        $expectedResult = 'SomeUser';

        // act
        $user->setUsername($username);
        $result = $user->getUsername();

        // assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testGetSetPassword()
    {
        // arrange
        $password = 'SomePassword';
        $user = new User();
        $expectedResult = 'SomePassword';

        // act
        $user->setPassword($password);
        $result = $user->getPassword();

        // assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testGetSetType()
    {
        // arrange
        $type = 'SomeType';
        $user = new User();
        $expectedResult = 'SomeType';

        // act
        $user->setType($type);
        $result = $user->getType();

        // assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testGetSetEmail()
    {
        // arrange
        $email = 'Someone@email.com';
        $user = new User();
        $expectedResult = 'Someone@email.com';

        // act
        $user->setEmail($email);
        $result = $user->getEmail();

        // assert
        $this->assertEquals($expectedResult, $result);
    }
}