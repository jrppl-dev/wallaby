<?php

namespace App\Containers\AppSection\Event\UI\API\Tests\Functional;

use App\Containers\AppSection\Event\Models\User;
use App\Containers\AppSection\Event\Tests\ApiTestCase;

/**
 * Class GetAllUsersTest.
 *
 * @group user
 * @group api
 */
class GetAllUsersTest extends ApiTestCase
{
    protected string $endpoint = 'get@v1/users';

    protected array $access = [
        'roles' => 'admin',
        'permissions' => 'list-users',
    ];

    public function testGetAllUsersByAdmin(): void
    {
        User::factory()->count(2)->create();

        $response = $this->makeCall();

        $response->assertStatus(200);
        $responseContent = $this->getResponseContentObject();

        self::assertCount(4, $responseContent->data);
    }

    public function testGetAllUsersByNonAdmin(): void
    {
        $this->getTestingUserWithoutAccess();
        User::factory()->count(2)->create();

        $response = $this->makeCall();

        $response->assertStatus(403);
        $this->assertResponseContainKeyValue([
            'message' => 'This action is unauthorized.',
        ]);
    }

    public function testSearchUsersByName(): void
    {
        User::factory()->count(3)->create();
        $user = $this->getTestingUser([
            'name' => 'mahmoudzzz'
        ]);

        $response = $this->endpoint($this->endpoint . '?search=name:mahmoudzzz')->makeCall();

        $response->assertStatus(200);
        $responseContent = $this->getResponseContentObject();
        self::assertEquals($user->name, $responseContent->data[0]->name);
        self::assertCount(1, $responseContent->data);
    }
}
