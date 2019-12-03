<?php

use Illuminate\Database\Seeder;
use App\User;
use Carbon\Carbon;

class ExamineeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	'name' => 'Christopher P. Vistal',
        	'address' => 'Awasian Tandag City',
        	'birth_date' => Carbon::now(),
        	'gender' => 'male',
        	'cellnumber' => '09193693499',
        	'email' => 'christophervistal26@gmail.com',
        	'password' => bcrypt(1234),
        	'school_year_id' => 1,
        ]);
    }
}
