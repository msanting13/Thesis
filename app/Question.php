<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Hash;

class Question extends Model
{
    protected $table = 'tbl_questions';
    protected $fillable = ['content','answers_key'];

    /**
     * Set the answer key and encrpyt.
     *
     * @param  string  $value
     * @return void
     */
    public function setAnswersKeyAttribute($value)
    {
        $this->attributes['answers_key'] = Hash::make(strtoupper($value));
    }

    public function categories()
    {
    	return $this->belongsTo('App\Category','category_id');
    }
    public function choices()
    {
    	return $this->hasMany('App\Choice','question_id')->orderBy('key', 'ASC');;
    }
}
