<?php

namespace Tests\Feature;

use App\Models\Question;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DatabaseTest extends TestCase
{
    use RefreshDatabase;

    public function test_correct_number_of_entries_created_in_questions_table(){
    $this->assertDatabaseCount('questions', 11);
    }

    public function test_that_question_model_exists_in_the_db(){
        $question = Question::factory()->create();

        $this->assertModelExists($question);
    }
}
