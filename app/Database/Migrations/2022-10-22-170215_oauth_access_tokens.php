<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class oauth_access_tokens extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'client_id' => [
                'type'       => 'VARCHAR',
                'constraint' => '80',
                'null' => false,
            ],
            'access_token' => [
                'type'       => 'VARCHAR',
                'constraint' => '40',
                'null' => false,
            ],
            'redirect_uri' => [
                'type'       => 'VARCHAR',
                'constraint' => '2000',
            ],
            'grant_types' => [
                'type'       => 'VARCHAR',
                'constraint' => '80',
            ],
            'scope' => [
                'type'       => 'VARCHAR',
                'constraint' => '4000',
            ],
            'user_id' => [
                'type'       => 'VARCHAR',
                'constraint' => '80',
            ],
        ]);
        $this->forge->addKey('client_id', true);
        $this->forge->createTable('oauth_access_tokens');
    }

    public function down()
    {
        $this->forge->dropTable('oauth_access_tokens');
    }


}
