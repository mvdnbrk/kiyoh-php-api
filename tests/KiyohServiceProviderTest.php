<?php

namespace Mvdnbrk\Kiyoh\Tests;

use Mvdnbrk\Kiyoh\Client;

class KiyohServiceProviderTest extends TestCase
{
    /** @test */
    public function it_can_retrieve_a_client_instance()
    {
        $this->assertInstanceOf(Client::class, resolve('kiyoh'));
    }
}
