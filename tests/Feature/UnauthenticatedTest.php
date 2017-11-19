<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UnauthenticatedTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testUnauthenticated()
    {
        $response = $this->call('GET', 'api/products');

        $response->assertStatus(401);
    }
}
