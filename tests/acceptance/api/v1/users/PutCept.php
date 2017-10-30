<?php
$I = new AcceptanceTester($scenario);

$I->wantToTest('put new user');
$I->sendPUT('/api/v1/users/6F9619FF-8B86-D011-B42D-00CF4FC964FF', [
    'login' => 'Foo',
    'email' => 'foo@bar.com',
    'password' => 'password'
]);
$I->seeResponseCodeIs(201);
$I->seeResponseContainsJson([
    'login' => 'Foo',
    'email' => 'foo@bar.com',
    'password' => 'password'
]);