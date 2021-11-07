<?php

namespace App\Containers\AppSection\Event\UI\API\Tests\Functional;

use App\Containers\AppSection\Event\Models\Event;
use App\Containers\AppSection\Event\Tests\ApiTestCase;

/**
 * Class FindUsersTest.
 *
 * @group user
 * @group api
 */
class GetAllEventsTest extends ApiTestCase
{
    protected string $endpoint = 'get@v1/events';

    protected array $access = [
        'roles' => '',
        'permissions' => 'list-events',
    ];

    public function testGetAllEvents(): void
    {
        $response = $this->makeCall();

        $response->assertStatus(200);
        $responseContent = $this->getResponseContentObject();
        self::assertEquals($this->getTotalAllEvents(), $responseContent->meta->pagination->total);
    }

    private function getTotalAllEvents()
    {
        return Event::count();
    }

}
