<?php

namespace FreeElephantsTests\RestAuth\acceptance\api\v1\users;

use AbstractCest;
use AcceptanceTester;

class GetJwtCest extends AbstractCest
{

    public function successTest(AcceptanceTester $I)
    {
        $I->wantToTest('get user jwt');
        $I->haveHttpHeader('Authorization', self::TEST_USER_LOGIN . ':' . self::TEST_USER_PASSWORD);
        $I->sendGET('/api/v1/auth/jwt');

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
    }

    public function wrongAuthorizationDataTest(AcceptanceTester $I)
    {
        $I->wantToTest('get user jwt with wrong authorization header');
        $I->haveHttpHeader('Authorization', 'test' . ':' . 'wrong_password!!');
        $I->sendGET('/api/v1/auth/jwt');
        $I->seeResponseCodeIs(401);
    }

    public function withoutAuthorizationHeaderTest(AcceptanceTester $I)
    {
        $I->wantToTest('get user jwt without authorization header');
        $I->sendGET('/api/v1/auth/jwt');
        $I->seeResponseCodeIs(401);
    }

}
