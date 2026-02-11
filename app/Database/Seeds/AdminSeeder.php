<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminSeeder extends Seeder
{
    // app/Database/Seeds/AdminSeeder.php
    public function run()
    {
        $settings = [
            ['key' => 'kost_name', 'value' => 'Alpha Kost'],
            ['key' => 'owner_name', 'value' => 'Pak Raji'],
            ['key' => 'phone', 'value' => '6287738350820'],
            ['key' => 'address', 'value' => 'Jl. Simongan Jl. Pamularsih Buntu No.41, Semarang'],
        ];
        $this->db->table('settings')->insertBatch($settings);

        $user = [
            'username' => 'admin',
            'password' => password_hash('password', PASSWORD_DEFAULT), // Enkripsi password
        ];
        $this->db->table('users')->insert($user);
    }
}
