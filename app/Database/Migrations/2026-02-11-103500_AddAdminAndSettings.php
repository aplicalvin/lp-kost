<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddAdminAndSettings extends Migration
    {
    // app/Database/Migrations/YYYY-MM-DD-######_AddAdminAndSettings.php
    public function up()
    {
        // Tabel Settings (Kontak & Alamat)
        $this->forge->addField([
            'id'    => ['type' => 'INT', 'constraint' => 1, 'unsigned' => true],
            'key'   => ['type' => 'VARCHAR', 'constraint' => '50'],
            'value' => ['type' => 'TEXT'],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('settings');

        // Tabel Users (Login Admin) 
        // app/Database/Migrations/YYYY-MM-DD-######_AddAdminAndSettings.php
        $this->forge->addField([
            'id'    => [
                'type'           => 'INT', 
                'constraint'     => 5, 
                'unsigned'       => true, 
                'auto_increment' => true // Tambahkan baris ini!
            ],
            'key'   => ['type' => 'VARCHAR', 'constraint' => '50'],
            'value' => ['type' => 'TEXT'],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('settings');
    }

    public function down()
    {
        $this->forge->dropTable('settings');
        $this->forge->dropTable('users');
    }
}
