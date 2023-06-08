<?php

namespace Tests\Feature;

use App\Models\Question;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class QuestionTest extends TestCase
{
    public function test_models_can_be_instantiated(): void
    {
        $question = Question::factory()->create();

        $this->assertModelExists($question);
    }

    public function testQuestions() {
    $questions = Question::factory(\App\Models\Question::class)->count(2)->create();

    $this->postJson('graphql', [
          'query' => <<<GQL
            query {
                questions {
                    title
                }
            }
          GQL
        ])
        ->assertJsonFragment(['title' => $questions[0]->title]);
   }

   public function test_questions_have_attempts_field() {
    $questions = Question::factory(\App\Models\Question::class)->count(2)->create();

    $this->postJson('graphql', [
          'query' => <<<GQL
            query {
                questions {
                    title
                    attempts
                }
            }
          GQL
        ])
        ->assertJsonFragment(['attempts' => $questions[0]->attempts]);
   }
}
