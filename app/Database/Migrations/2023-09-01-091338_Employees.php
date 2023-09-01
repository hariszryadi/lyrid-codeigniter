<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Employees extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'nip' => [
                'type' => 'VARCHAR',
                'constraint' => '10',
            ],
            'place_of_birth' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'date_of_birth' => [
                'type' => 'DATE',
            ],
            'photo' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
        ]);
        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('employees');
    }

    public function down()
    {
        $this->forge->dropTable('employees');
    }
}
