<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddAdminAndSettings extends Migration
{
    public function up()
    {
        // 1. Tabel Settings
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true, // WAJIB ADA agar tidak error Duplicate entry '0'
            ],
            'key' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'value' => [
                'type' => 'TEXT',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('settings');

        // 2. Tabel Users (Login Admin)
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'username' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'password' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('settings');
        $this->forge->dropTable('users');
    }
}