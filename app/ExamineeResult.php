<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExamineeResult extends Model
{
    protected $table = "tbl_examinee_results";
    protected $fillable = ['verbal_comprehension', 'verbal_reasoning', 'figurative_reasoning', 'quantitative_reasoning'];
}
