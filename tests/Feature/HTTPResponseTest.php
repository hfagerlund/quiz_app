<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use Illuminate\Http\Response;

class HTTPResponseTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
       $response = $this->post('/graphql/', ['query' => '{questions{}}']);
       $response
            ->assertStatus(200);
       }
}
