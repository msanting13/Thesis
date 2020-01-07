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
        	'name' => 'jhon Doe',
        	'address' => 'Tandag City',
        	'birth_date' => Carbon::now(),
        	'gender' => 'male',
        	'cellnumber' => '09193693499',
        	'email' => 'doe@gmail.com',
        	'password' => bcrypt(1234),
        	'school_year_id' => 1,
        ]);
    }
}
