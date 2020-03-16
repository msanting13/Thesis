<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionType extends Model
{
	protected $table    = 'tbl_question_types';
	protected $fillable = ['code', 'type', 'instruction'];
	
	public const IDENTIFICATION    = 'I';
    public const MULTIPLE_CHOICE   = 'MC';
    public const FILL_IN_THE_BLANK = 'FITB';

    public function questions()
    {
    	return $this->hasMany('App\Question','type_id');
    }
}
