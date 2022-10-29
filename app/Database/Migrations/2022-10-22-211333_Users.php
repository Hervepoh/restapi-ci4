<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class Users extends Migration
{
    public function up()
    {
        
        //$forge->addField("label varchar(100) NOT NULL DEFAULT 'default label'");
        $this->forge->addField([
            'id' => [
                'type'       => 'INT',
                'constraint' => 5,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'firstname' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
            ],
            'lastname' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'password' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'scope' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
                'default'       => 'app',
            ],
            'created_at' => [
                'type'       => 'TIMESTAMP',
                'default'       => new RawSql('CURRENT_TIMESTAMP')
            ],
            'updated_at' => [
                'type'       => 'TIMESTAMP',
                'default'       => new RawSql('CURRENT_TIMESTAMP')
            ],

            'deleted_at' => [
                'type'       => 'TIMESTAMP',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
