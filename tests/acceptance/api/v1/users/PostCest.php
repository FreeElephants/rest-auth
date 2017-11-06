<?php

class PostCest extends AbstractCest
{
    public function registerNewUserTest(AcceptanceTester $I)
    {

        $I->wantToTest('register new user');
        $I->sendPOST('/api/v1/users/6F9619FF-8B86-D011-B42D-00CF4FC964FF', [
            'login' => 'Foo',
            'email' => 'foo@bar.com',
            'password' => 'password'
        ]);
        $I->seeResponseCodeIs(201);
        $I->seeResponseContainsJson([
            'login' => 'Foo'
        ]);
    }

    public function duplicateGuidTest(AcceptanceTester $I)
    {
        $I->wantTo('register new user with existed GUID');
        $I->sendPOST('/api/v1/users/' . self::TEST_USER_GUID, [
            'login' => 'Foo2',
            'email' => 'foo2@bar.com',
            'password' => 'password'
        ]);
        $I->seeResponseCodeIs(400);
        $I->seeResponseContainsJson([
            'error' => [
                'message' => 'User with given guid \'2c044f97-c0a5-4267-833a-b6fedba93ffa\' already exists. ',
            ],
        ]);
    }

    public function duplicationLoginTest(AcceptanceTester $I)
    {
        $I->wantToTest('register new user with existed login');
        $I->sendPOST('/api/v1/users/6F9619FF-8B86-D011-B42D-00CF4FC964DD', [
            'login' => self::TEST_USER_LOGIN,
            'email' => 'foo2@bar.com',
            'password' => 'password'
        ]);
        $I->seeResponseCodeIs(400);
        $I->seeResponseContainsJson([
            'error' => [
                'message' => 'User with given login \'test\' already exists. ',
            ],
        ]);
    }

    public function duplicateEmailTest(AcceptanceTester $I)
    {
        $I->wantToTest('register new user with existed email');
        $I->sendPOST('/api/v1/users/6F9619FF-8B86-D011-B42D-00CF4FC964DD', [
            'login' => 'Foo2',
            'email' => self::TEST_USER_EMAIL,
            'password' => 'password'
        ]);
        $I->seeResponseCodeIs(400);
        $I->seeResponseContainsJson([
            'error' => [
                'message' => 'User with given email \'test@mail.com\' already exists. ',
            ],
        ]);
    }
}