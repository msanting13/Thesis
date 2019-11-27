<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'tbl_categories';
    protected $fillable = ['name','description'];

    public function questions()
    {
    	return $this->hasMany('App\Question','category_id');
    }
}
