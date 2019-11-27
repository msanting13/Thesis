<?php

use Illuminate\Database\Seeder;
use App\ChoiceKey;

class ChoicesKeyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $choicesKeys = ['A','B','C','D','E'];
        foreach ($choicesKeys as $key => $choicesKey) 
        {
        	$choicesKeyModel = new ChoiceKey();
        	$choicesKeyModel->key = $choicesKey;
        	$choicesKeyModel->save();
        }
    }
}
