<?php

use Illuminate\Database\Seeder;

use App\Course;
use App\Department;

class CourseSeeder extends Seeder
{
	private function insertCAScourse($department)
	{
		DB::table('tbl_course')->insert([
					[
						'course_descr' => 'Bachelor of Arts in Economics',
						'course_code' => 'BA-Econ',
						'department_id' => $department->id
					],
					[
						'course_descr' => 'Bachelor of Arts in English',
						 'course_code' => 'BA-Eng',
						  'department_id' => $department->id
					],
					[
						'course_descr' => 'Bachelor of Arts in Filipino',
						'course_code' => 'BA-Fil',
						'department_id' => $department->id
					],
					[
						'course_descr' => 'Bachelor of Arts in Political Science',
						'course_code' => 'BA-PolSci' ,
						'department_id' => $department->id
					],
					[
						'course_descr' => 'Bachelor of Arts in Public Administration',
						 'course_code' => 'BA-PubAD',
						 'department_id' => $department->id
						],
					[
						'course_descr' => 'Bachelor of Arts in Social Science',
						'course_code' => 'BASS',
						 'department_id' => $department->id],
					[
						'course_descr' => 'Bachelor of Science in Biology',
						'course_code' => 'BS-Bio',
						'department_id' => $department->id
					],
					[
						'course_descr' => 'Bachelor of Science in Environmental Science',
						'course_code' => 'BS-EnviSci',
						'department_id' => $department->id
					],
					[
						'course_descr' => 'Diploma in Midwifery',
						 'course_code' => 'DIM',
						 'department_id' => $department->id
					]
        		]);
	}

	private function insertBusinessCourse($department)
	{
		DB::table('tbl_course')->insert([
			[
				'course_descr'  => 'Bachelor of Science in Business Administration major in Financial Management',
				'course_code'   => 'BSBAFM',
				'department_id' => $department->id
			],

			[
				'course_descr' => 'Bachelor of Science in Business Administration major in Human Resource Management',
				'course_code' => 'BSBA-HRM',
				'department_id' => $department->id,
			],


			[
				'course_descr'  => 'Bachelor of Science in Business Administration major in Marketing Management',
				'course_code'   => 'BSBAMM',
				'department_id' => $department->id,
			],


			[
			'course_descr' => 'Bachelor of Science in Hospitality Management',
			'course_code' => 'BSHM',
			'department_id' => $department->id, 
			]
		]);
	}

	private function insertComputerCourse($department)
	{
		DB::table('tbl_course')->insert([
			[
				'course_descr'  => 'Bachelor of Science in Civil Engineering',
				'course_code'   => 'BSCE',
				'department_id' => $department->id
			],
			[
				'course_descr'  => 'Bachelor of Science in Computer Science',
				'course_code'   => 'BSCS',
				'department_id' => $department->id,
			]
		]);
	}

	private function insertTeacherCourse($department)
	{
		DB::table('tbl_course')->insert([
			[
				'course_descr'  =>  'Bachelor of Early Childhood Education',
				'course_code'   => 'BECE',
				'department_id' => $department->id,
			],

			[
				'course_descr'  =>  'Bachelor of Physical Education',
				'course_code'   => 'BPED',
				'department_id' => $department->id,
			],

			[
				'course_descr'  =>  'Bachelor of Secondary Education major in English',
				'course_code'   => 'BSED-English',
				'department_id' => $department->id,
			],

			[
				'course_descr'  =>  'Bachelor of Secondary Education major in Filipino',
				'course_code'   => 'BSED-Filipino',
				'department_id' => $department->id,
			],

			[
				'course_descr'  =>  'Bachelor of Secondary Education major in Science',
				'course_code'   => 'BSED-Science',
				'department_id' => $department->id,
			],

			[
				'course_descr'  => 'Diploma in Teaching',
				'course_code'   => 'DIT',
				'department_id' => $department->id,
			]

		]);
	}

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Department::get()->each(function ($department) {
        	switch ($department->id) {
        		case 1:
        			$this->insertCAScourse($department);
        			break;
        		case 2:
        			$this->insertBusinessCourse($department);
        			break;
        		case 3:
        			$this->insertComputerCourse($department);
        			break;
        		default :
        			$this->insertTeacherCourse($department);
        	}
        });
    }
}
