<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Init extends Seeder
{
    public function run()
    {
        //php spark make:seeder Init --suffix --namespace Acme\Blog
        $this->call('oauth_clients_seeder');
        $this->call('oauth_users_seeder');
        $this->call('Blog');
    }

    
}
