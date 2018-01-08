<?php

namespace FreeElephantsTests\RestAuth\acceptance\api\v1\users;

use AbstractCest;
use AcceptanceTester;

class GetCest extends AbstractCest
{

    public function successTest(AcceptanceTester $I)
    {
        $I->wantToTest('get user by guid');
        $I->sendGET('/api/v1/users/' . self::TEST_USER_GUID);

        $I->seeResponseCodeIs(200);
        $I->seeResponseContainsJson([
            'login' => self::TEST_USER_LOGIN,
        ]);
    }

    public function nonFoundUserTest(AcceptanceTester $I)
    {
        $I->wantToTest('get non existed user by guid');
        $I->sendGET('/api/v1/users/non-existed-guid');
        $I->seeResponseCodeIs(404);
    }
}
