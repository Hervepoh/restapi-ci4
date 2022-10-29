<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class oauth_clients_seeder extends Seeder
{
    public function run()
    {
        $this->clientSeeder();
    }

    protected function clientSeeder()
    {
        $data = [
            'client_id'     => 'testclient',
            'client_secret' => 'testsecret',
            'grant_types'   => 'password',
            'scope'         => 'app',
        ];

        // Simple Queries
        $this->db->query('INSERT INTO oauth_clients (client_id, client_secret,grant_types,scope) VALUES(:client_id:, :client_secret:, :grant_types:, :scope:)', $data);

        // Using Query Builder
        $this->db->table('oauth_clients')->insert($data);
    }

}
