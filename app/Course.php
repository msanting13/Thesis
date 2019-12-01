<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = "tbl_course";
    protected $fillable = ['course_code','course_descr','department_id'];

    public function department()
    {
    	return $this->belongsTo('App\Department','department_id');
    }
}
