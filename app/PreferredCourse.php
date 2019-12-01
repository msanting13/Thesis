<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PreferredCourse extends Model
{
    protected $table = 'tbl_preferred_courses';
    protected $fillable = ['first_preferred_course','second_preferred_course','examinee_id'];

    public function examinee()
    {
        return $this->belongsTo('App\User','examinee_id');
    }
    public function firstPreferredCourse()
    {
    	return $this->belongsTo('App\Course','first_preferred_course')->select('course_code','course_descr');
    }
    public function secondPreferredCourse()
    {
    	return $this->belongsTo('App\Course','second_preferred_course')->select('course_code','course_descr');
    }
    
}
