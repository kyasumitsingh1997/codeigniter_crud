<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Students extends Migration
{
	public function up()
	{
		$this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'student_name' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => false
            ],
			'student_class' => [
                'type' => 'INT',
                'constraint' => '11',
                'null' => false,
            ],
			'student_age' => [
                'type' => 'INT',
                'constraint' => '11',
                'null' => false,
            ],
            'student_gender' => [
				'type' => 'VRACHAR',
				'constraint' => '5',
                'null' => false,
            ],
        'created_at datetime default current_timestamp',
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('students');
	}

	public function down()
	{
		$this->forge->dropTable('students');
	}
}
