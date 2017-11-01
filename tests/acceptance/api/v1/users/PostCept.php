<?php
$I = new AcceptanceTester($scenario);

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

$I->wantTo('register new user with existed GUID');
$I->sendPOST('/api/v1/users/6F9619FF-8B86-D011-B42D-00CF4FC964FF', [
    'login' => 'Foo2',
    'email' => 'foo2@bar.com',
    'password' => 'password'
]);
$I->seeResponseCodeIs(400);
$I->seeResponseContainsJson([
    'error' => [
        'message' => 'User with given guid \'6F9619FF-8B86-D011-B42D-00CF4FC964FF\' already exists. ',
    ],
]);

$I->wantToTest('register new user with existed login');
$I->sendPOST('/api/v1/users/6F9619FF-8B86-D011-B42D-00CF4FC964DD', [
    'login' => 'Foo',
    'email' => 'foo2@bar.com',
    'password' => 'password'
]);
$I->seeResponseCodeIs(400);
$I->seeResponseContainsJson([
    'error' => [
        'message' => 'User with given login \'Foo\' already exists. ',
    ],
]);

$I->wantToTest('register new user with existed email');
$I->sendPOST('/api/v1/users/6F9619FF-8B86-D011-B42D-00CF4FC964DD', [
    'login' => 'Foo2',
    'email' => 'foo@bar.com',
    'password' => 'password'
]);
$I->seeResponseCodeIs(400);
$I->seeResponseContainsJson([
    'error' => [
        'message' => 'User with given email \'foo@bar.com\' already exists. ',
    ],
]);