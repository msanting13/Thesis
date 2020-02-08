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
        // For multiple choice type
        factory(Question::class, 5)->create()->each(function($question) {
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

             Choice::create([
                'content' => 'Sample Content',
                'question_id' => $question->id,
                'key' => 'D',
            ]);

              Choice::create([
                'content' => 'Sample Content',
                'question_id' => $question->id,
                'key' => 'E',
            ]);
        });

        // For Fill in the blank type
        // For development I just hard code the category_id
        // 2 in type_id means "Fill in the blank" visit the database. 
        /*foreach(range(1, 5) as $questionNo) {
            Question::create([
                'content' => 'Question ' . $questionNo,
                'answers_key' => 'answer',
                'category_id' => 1,
                'type_id'     => 2,
            ]);
        }*/
    }
}
