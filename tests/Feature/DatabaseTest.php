<?php

namespace Tests\Feature;

use App\Models\Question;
use App\Models\Hint;
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

    public function test_that_questions_table_contains_attempts_column_containing_matching_record_in_the_db(){
        $questions = Question::factory()->create(['attempts' => 1]);

        $this->assertDatabaseHas('questions', [
            'attempts' => '1',
        ]);
        $this->assertDatabaseMissing('questions', [
            'attempts' => '2',
        ]);
    }

    public function test_that_questions_table_contains_points_column_containing_matching_record_in_the_db(){
        $questions = Question::factory()->create(['points' => 15]);

        $this->assertDatabaseHas('questions', [
            'points' => '15',
        ]);
        $this->assertDatabaseMissing('questions', [
            'points' => '1',
        ]);
    }

    public function test_that_hints_table_contains_points_decreased_by_column_containing_matching_record_in_the_db(){
        $hints = Hint::factory()->create(['points_decreased_by' => 3]);

        $this->assertDatabaseHas('hints', [
            'points_decreased_by' => '3',
        ]);
        $this->assertDatabaseMissing('hints', [
            'points_decreased_by' => '2',
        ]);
    }
}
