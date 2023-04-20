<?php

namespace tests\unit\models;

use app\models\User_B;

class UserTest extends \Codeception\Test\Unit
{
    public function testFindUserById()
    {
        verify($user = User_B::findIdentity(100))->notEmpty();
        verify($user->username)->equals('admin');

        verify(User_B::findIdentity(999))->empty();
    }

    public function testFindUserByAccessToken()
    {
        verify($user = User_B::findIdentityByAccessToken('100-token'))->notEmpty();
        verify($user->username)->equals('admin');

        verify(User_B::findIdentityByAccessToken('non-existing'))->empty();
    }

    public function testFindUserByUsername()
    {
        verify($user = User_B::findByUsername('admin'))->notEmpty();
        verify(User_B::findByUsername('not-admin'))->empty();
    }

    /**
     * @depends testFindUserByUsername
     */
    public function testValidateUser()
    {
        $user = User_B::findByUsername('admin');
        verify($user->validateAuthKey('test100key'))->notEmpty();
        verify($user->validateAuthKey('test102key'))->empty();

        verify($user->validatePassword('admin'))->notEmpty();
        verify($user->validatePassword('123456'))->empty();        
    }

}
