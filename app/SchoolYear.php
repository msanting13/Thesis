<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolYear extends Model
{
    protected $table = 'tbl_school_years';
    protected $fillable = ['school_year'];
    protected $casts = ['is_open' => 'boolean'];

    public function examinees()
    {
        return $this->hasMany('App\User','school_year_id');
    }

    public function scopeHasSchoolYear($query, $schoolYear)
    {
    	return $query->where('school_year', $schoolYear)->count();
    }

    public function scopeHasActiveSchoolYear($query)
    {
    	return $query->where('is_open', true)->count();
    }
}
