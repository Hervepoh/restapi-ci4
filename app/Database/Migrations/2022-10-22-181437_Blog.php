<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class Blog extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'post_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'auto_increment' => true
            ],
            'post_title' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'post_description' => [
                'type'       => 'TEXT',
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
        $this->forge->addKey('post_id', true);
        $this->forge->createTable('blog');
    }

    public function down()
    {
        $this->forge->dropTable('blog');
    }
}
