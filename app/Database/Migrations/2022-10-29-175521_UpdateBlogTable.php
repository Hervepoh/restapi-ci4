<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UpdateBlogTable extends Migration
{
    public function up()
    {   
        $fields = [
            'post_featured_image' => ['type' => 'VARCHAR','constraint' => '255'],
        ];
        $this->forge->addColumn('blog', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('blog','post_featured_image');
    }
}
