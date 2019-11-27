<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{
    protected $table = 'tbl_question_choices';
    protected $fillable = ['content','key'];

    public function questions()
    {
    	return $this->belongsTo('App\Question','question_id');
    }
}
