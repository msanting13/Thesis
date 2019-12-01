<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'tbl_examinees';
    protected $fillable = [
        'examinee_number', 'name', 'address', 'birth_date', 'gender', 'cellnumber', 'email', 'password','school_year_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function schoolYear()
    {
        return $this->belongsTo('App\SchoolYear','school_year_id');
    }

    public function preferredCourses()
    {
        return $this->hasOne('App\PreferredCourse','examinee_id');
    }

    public static function boot()
    {
        parent::boot();
        self::creating(function(User $admin) {
            $examineeCount = User::count();
            $admin->examinee_number = date('Y') . ++$examineeCount;
            return true;
        });
    }


}
