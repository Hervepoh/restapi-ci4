<?php

namespace App\Database\Seeds;

use App\Models\BlogModel;
use CodeIgniter\Database\Seeder;
use CodeIgniter\Test\Fabricator;

class Blog_seeder extends Seeder
{
    public function run()
    {
        $data = [
            'post_title'       => 'word',
            'post_description'     => 'sentences',
        ];
        $fabricator = new Fabricator(BlogModel::class,$data);
        $fabricator->create(10);
    }
}
