<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class GetImageTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGetImage()
    {
        $response = $this->call('GET', 'api/image?name=beras.jpeg');

        $response->assertStatus(200);
    }

    public function testGetNotFoundImage()
    {
        $response = $this->call('GET', 'api/image?name=notfoundimage.jpeg');
        
        $response->assertStatus(404);
    }
}
