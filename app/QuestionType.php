<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionType extends Model
{
	protected $table = 'tbl_question_types';
	protected $fillable = ['code', 'type', 'instruction'];
	
    public function questions()
    {
    	return $this->hasMany('App\Question','type_id');
    }
}
