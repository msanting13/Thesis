<?php

use Illuminate\Database\Seeder;
use App\Question;
use App\Choice;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Question::class, 3)->create()->each(function($question) {
            Choice::create([
            	'content' => 'Sample Content',
            	'question_id' => $question->id,
            	'key' => 'A',
            ]);

            Choice::create([
            	'content' => 'Sample Content',
            	'question_id' => $question->id,
            	'key' => 'B',
            ]);

            Choice::create([
            	'content' => 'Sample Content',
            	'question_id' => $question->id,
            	'key' => 'C',
            ]);

        });
    }
}
