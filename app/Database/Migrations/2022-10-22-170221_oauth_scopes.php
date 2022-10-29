<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;


class oauth_jwt_tbl extends Migration
{ 
    public function up()
    {
        $this->forge->addField([
            'scope' => [
                'type'       => 'VARCHAR',
                'constraint' => '80',
                'null' => false,
            ],
            'is_default' => [
                'type'       => 'TINYINT',
                'constraint' => '1',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('scope', true);
        $this->forge->createTable('oauth_scopes');
        
    }

    public function down()
    {
        $this->forge->dropTable('oauth_scopes'); 
    }


}
