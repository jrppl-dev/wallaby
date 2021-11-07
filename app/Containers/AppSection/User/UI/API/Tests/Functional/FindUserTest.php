<?php

namespace App\Containers\AppSection\User\UI\API\Tests\Functional;

use App\Containers\AppSection\User\Tests\ApiTestCase;

/**
 * Class FindUsersTest.
 *
 * @group user
 * @group api
 */
class FindUserTest extends ApiTestCase
{
    protected string $endpoint = 'get@v1/user/profile';

    protected array $access = [
        'roles' => '',
        'permissions' => '',
    ];

    public function testFindUser(): void
    {
        $user = $this->getTestingUser();

        $response = $this->makeCall();

        $response->assertStatus(200);
        $responseContent = $this->getResponseContentObject();
        self::assertEquals($user->name, $responseContent->data->name);
    }

}
