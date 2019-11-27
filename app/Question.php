<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'tbl_questions';
    protected $fillable = ['content','answers_key'];

    public function categories()
    {
    	return $this->belongsTo('App\Category','category_id');
    }
    public function choices()
    {
    	return $this->hasMany('App\Choice','question_id')->orderBy('key', 'ASC');;
    }
}
