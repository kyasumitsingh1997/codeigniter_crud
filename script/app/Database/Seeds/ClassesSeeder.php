<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ClassesSeeder extends Seeder
{
	public function run()
	{
		$data = [
            ['name' => 'BCA'],
            ['name' => 'BSC'],
            ['name' => 'BTECH'],
            ['name' => 'BCOM'],
            ['name' => 'MBA'],
            ['name' => 'BBA'],
        ];
		$this->db->table('classes')->insert($data);
	}
}
