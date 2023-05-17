<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DatabaseTest extends TestCase
{
    use RefreshDatabase;
    
    public function test_correct_number_of_questions_created(){
    $this->seed();
    $this->assertDatabaseCount('questions', 11);
    }
}
