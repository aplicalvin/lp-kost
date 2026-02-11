<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class KostSeeder extends Seeder
{
    // Database/Seeds/KostSeeder.php

    public function run()
    {
        $roomData = [
            [
                'room_type'   => 'Big Room',
                'price'       => 1450000, // 
                'wa_template' => 'Halo Pak Raji, saya mau pesan kamar besar. Apakah masih tersedia?' // 
            ],
            [
                'room_type'   => 'Small Room',
                'price'       => 1350000, // 
                'wa_template' => 'Halo Pak Raji, saya mau pesan kamar kecil. Apakah masih tersedia?' // 
            ],
        ];

        $this->db->table('rooms')->insertBatch($roomData);

        // Contoh Testimoni Awal
        $testimonialData = [
            [
                'name'    => 'Budi Santoso',
                'content' => 'Kostnya bersih dan Pak Raji sangat ramah. Lokasi strategis dekat Pamularsih.', // 
                'stars'   => 5
            ],
        ];
        
        $this->db->table('testimonials')->insertBatch($testimonialData);
    }
}
