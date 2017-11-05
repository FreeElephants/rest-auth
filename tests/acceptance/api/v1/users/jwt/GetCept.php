<?php
$I = new AcceptanceTester($scenario);

$I->wantToTest('get user jwt');
$I->haveHttpHeader('Authorization', 'test' . ':' . 'password');
$I->sendGET('/api/v1/users/2c044f97-c0a5-4267-833a-b6fedba93ffa/jwt');


//{
//  "typ": "JWT",
//  "alg": "HS256"
//}
//{
//  "guid": "2c044f97-c0a5-4267-833a-b6fedba93ffa",
//  "login": "test",
//  "email": "test@mail.com",
//  "roles": [
//      "user"
//  ]
//}
// secret

$I->seeResponseCodeIs(200);
$I->seeResponseContainsJson([
    'jwt' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJndWlkIjoiMmMwNDRmOTctYzBhNS00MjY3LTgzM2EtYjZmZWRiYTkzZmZhIiwibG9naW4iOiJ0ZXN0IiwiZW1haWwiOiJ0ZXN0QG1haWwuY29tIiwicm9sZXMiOlsidXNlciJdfQ._CmNBHt36MhweP8thmSo_NoXqNaVa4fOfP7GlTXY9qs'
]);

$I->wantToTest('get user jwt with wrong authorization header');
$I->haveHttpHeader('Authorization', 'test' . ':' . 'wrong_password!!');
$I->sendGET('/api/v1/users/2c044f97-c0a5-4267-833a-b6fedba93ffa/jwt');
$I->seeResponseCodeIs(401);
