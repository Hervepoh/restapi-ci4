<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;
class oauth_access_tokens extends Migration
{ 
    public function up()
    {
        $this->forge->addField([
            'access_token' => [
                'type'       => 'VARCHAR',
                'constraint' => '40',
                'null' => false,
            ],
            'client_id' => [
                'type'       => 'VARCHAR',
                'constraint' => '80',
                'null' => false,
            ],
            'user_id' => [
                'type'       => 'VARCHAR',
                'constraint' => '80',
                'null' => true,
            ],
            'expires' => [
                'type'       => 'TIMESTAMP',
                'default'    => new RawSql('CURRENT_TIMESTAMP')
            ],
            'scope' => [
                'type'       => 'VARCHAR',
                'constraint' => '4000',
            ],
        ]);
        $this->forge->addKey('access_token', true);
        $this->forge->createTable('oauth_access_tokens');
        
    }

    public function down()
    {
       
        $this->forge->dropTable('oauth_access_tokens');
      
    }


}
