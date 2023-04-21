<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Hint;
use App\Models\Question;

class HintSeeder extends Seeder
{
    /**
     * Run the database seeds.
      *
      * @return void
     */
    public function run(): void
    {
        // create three Hint model instances that belong to a single question
        Hint::factory()
            ->count(3)
            ->for(Question::factory())
            ->create();
    }
}
