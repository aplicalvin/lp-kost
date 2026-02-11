<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateKostTables extends Migration
{
// Database/Migrations/YYYY-MM-DD-######_CreateKostTables.php

    public function up()
    {
        // Tabel Kamar (Rooms)
        $this->forge->addField([
            'id'          => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true, 'auto_increment' => true],
            'room_type'   => ['type' => 'VARCHAR', 'constraint' => '50'], // Big Room / Small Room 
            'price'       => ['type' => 'DECIMAL', 'constraint' => '10,2'],
            'description' => ['type' => 'TEXT', 'null' => true],
            'wa_template' => ['type' => 'TEXT'], // Menyimpan format pesan WA 
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('rooms');

        // Tabel Testimoni (Sesuai permintaan porto & testimoni) 
        $this->forge->addField([
            'id'      => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true, 'auto_increment' => true],
            'name'    => ['type' => 'VARCHAR', 'constraint' => '100'],
            'content' => ['type' => 'TEXT'],
            'stars'   => ['type' => 'INT', 'constraint' => 1],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('testimonials');
    }

    public function down()
    {
        //
    }
}
