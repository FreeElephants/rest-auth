<?php
$I = new AcceptanceTester($scenario);

$I->wantToTest('get user by uid');
$I->sendGET('/api/v1/users/');

