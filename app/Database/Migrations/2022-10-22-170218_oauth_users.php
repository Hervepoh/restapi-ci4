<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class oauth_users extends Migration
{
    public function up()
    {
        
        //$forge->addField("label varchar(100) NOT NULL DEFAULT 'default label'");
        $this->forge->addField([
            'username' => [
                'type'       => 'VARCHAR',
                'constraint' => '80',
                'null' => false
            ],
            'password' => [
                'type'       => 'VARCHAR',
                'constraint' => '80',
                'null' => true
            ],
            'first_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '80',
                'null' => true
            ],
            'last_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '80',
                'null' => true
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => '80',
                'null' => true
            ],
            'email_verified' => [
                'type'       => 'TINYINT',
                'constraint' => '1',
                'null' => true
            ],
            'scope' => [
                'type'       => 'VARCHAR',
                'constraint' => '4000',
            ],
        ]);
        $this->forge->addKey('username', true);
        $this->forge->createTable('oauth_users');
    }

    public function down()
    {
        $this->forge->dropTable('oauth_users');
    }
}
