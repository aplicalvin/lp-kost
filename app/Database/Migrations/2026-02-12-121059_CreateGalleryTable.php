<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateGalleryTable extends Migration
{
    // app/Database/Migrations/YYYY-MM-DD-######_CreateGalleryTable.php
    public function up()
    {
        $this->forge->addField([
            'id'          => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true, 'auto_increment' => true],
            'image_path'  => ['type' => 'VARCHAR', 'constraint' => '255'],
            'caption'     => ['type' => 'VARCHAR', 'constraint' => '100', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('galleries');
    }

    public function down()
    {
        //
    }
}
