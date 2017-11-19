<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class GetProductListTest extends TestCase
{
    use WithoutMiddleware;
    /**
     *
     * @return void
     */
    public function testProductListing()
    {
        $response = $this->call('GET','api/products');

        $response->assertStatus(200);
    }
}
