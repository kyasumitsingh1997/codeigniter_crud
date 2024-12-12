<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class StudentSeeder extends Seeder
{
	public function run()
	{
		
		$data = [
            [
			'student_name' => 'Salmaan Khan',
            'student_class'    => '1',
			'student_age'  => '25',
			'student_gender' => 'm'
			],
            [
			'student_name' => 'Salim Khan',
            'student_class'    => '3',
			'student_age'  => '30',
			'student_gender' => 'm'
			],
            [
			'student_name' => 'Shahid Kapoor',
            'student_class'    => '2',
			'student_age'  => '27',
			'student_gender' => 'm'
			],
            [
			'student_name' => 'Anil Kapoor',
            'student_class'    => '4',
			'student_age'  => '32',
			'student_gender' => 'm'
			],
            [
			'student_name' => 'Katrina Kaif',
            'student_class'    => '2',
			'student_age'  => '24',
			'student_gender' => 'f'
			],
            [
			'student_name' => 'Kishor Kumar',
            'student_class'    => '5',
			'student_age'  => '31',
			'student_gender' => 'm'
			],
        ];
		$this->db->table('students')->insert($data);
	}
}
