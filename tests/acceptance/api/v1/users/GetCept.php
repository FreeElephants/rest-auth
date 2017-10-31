<?php
$I = new AcceptanceTester($scenario);

$I->wantToTest('get user by uid');
$I->sendGET('/api/v1/users/2c044f97-c0a5-4267-833a-b6fedba93ffa');

$I->seeResponseCodeIs(200);
$I->seeResponseContainsJson([
    'login' => 'test',
]);

