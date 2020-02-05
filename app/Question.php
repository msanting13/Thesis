<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Hash;

class Question extends Model
{
    protected $table = 'tbl_questions';
    protected $fillable = ['content','answers_key','type_id'];
    //protected $appends = ['answers_key'];
    /**
     * Set the answer key and encrpyt.
     *
     * @param  string  $value
     * @return void
     */
    public function getAnswersKeyHashAttribute()
    {
        return Hash::make($this->answers_key);
    }
    public function categories()
    {
    	return $this->belongsTo('App\Category','category_id');
    }

    public function choices()
    {
    	return $this->hasMany('App\Choice','question_id')->orderBy('key', 'ASC');;
    }

    public function type()
    {
        return $this->belongsTo('App\QuestionType', 'type_id');
    }
    public static function boot()
    {
        parent::boot();
        self::creating(function(Question $question) {
            if ($question->type->code == 'FITB') {
                $question->answers_key = json_encode($question->answers_key);
            }
            else{
                $question->answers_key = Hash::make(strtoupper($question->answers_key));
            }
            return true;
        });
    }
}
