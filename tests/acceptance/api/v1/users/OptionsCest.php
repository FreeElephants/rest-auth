<?php

namespace FreeElephantsTests\RestAuth\acceptance\api\v1\users;

use AbstractCest;
use AcceptanceTester;

class OptionsCest extends AbstractCest
{

    public function optionsTest(AcceptanceTester $I)
    {
        $I->wantToTest('user resource options');
        $I->sendOPTIONS('/api/v1/users/' . self::TEST_USER_GUID);
        $I->seeResponseCodeIs(200);
    }

}
