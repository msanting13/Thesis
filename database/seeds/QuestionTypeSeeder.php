<?php

use App\QuestionType;
use Illuminate\Database\Seeder;

class QuestionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$types = ['Multiple Choice', 'Fill in the blank', 'Essay', 'Identification'];
    	foreach ($types as $type) {    		
    		QuestionType::create([
                // Creating abbrevation for type name.
                'code' => strtoupper(preg_replace('/\b(\w)|./', '$1', $type)),
        		'name' => $type 
        	]);
    	}
    }
}
