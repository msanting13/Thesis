<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = "tbl_departments";
    protected $fillable = ['department_name'];

    public function courses()
    {
    	return $this->hasMany('App\Course','department_id');
    }
}
