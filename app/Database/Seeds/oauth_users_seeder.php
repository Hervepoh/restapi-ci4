<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class oauth_users_seeder extends Seeder
{
    public function run()
    {
        $this->userSeeder();
    }

    protected function userSeeder()
    {
        $data = [
            'username'       => 'alexlancer1',
            'password'       => 'password',
            'first_name'     => 'Alex',
            'last_name'      => 'Lancer',
            'email'          => 'test@alexlancer.com',
            'email_verified' =>  1,
            'scope'          => 'app',
        ];

        // Simple Queries
        $this->db->query('INSERT INTO oauth_users VALUES(:username:, :password:, :email:, :email_verified:, :scope:)', $data);

        // Using Query Builder
        $this->db->table('oauth_users')->insert($data);
    }

}
