<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DatabaseTest extends TestCase
{
    use RefreshDatabase;

    public function test_correct_number_of_entries_created_in_questions_table(){
    $this->assertDatabaseCount('questions', 11);
    }
}
