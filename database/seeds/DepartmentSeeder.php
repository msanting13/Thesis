<?php

use Illuminate\Database\Seeder;
use App\Department;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Department::create([
    		'department_name' => 'College of Arts and Sciences',
    	]);

    	Department::create([
    		'department_name' => 'College of Business Management',
    	]);

    	Department::create([
    		'department_name' => 'College of Engineering, Computer Studies and Technology',
    	]);

    	Department::create([
    		'department_name' => 'College of Teacher Education',
    	]);
    }
}
