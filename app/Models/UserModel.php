<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    // Nama tabel di database sesuai dengan migration Anda
    protected $table            = 'users';
    
    // Primary key tabel
    protected $primaryKey       = 'id';

    // Kolom yang diizinkan untuk diisi/diubah
    protected $allowedFields    = ['username', 'password'];

    // Fitur keamanan tambahan (opsional)
    protected $useTimestamps    = false;
    protected $returnType       = 'array';

    /**
     * Fungsi opsional untuk mempermudah pencarian user berdasarkan username
     */
    public function getUserByUsername($username)
    {
        return $this->where('username', $username)->first();
    }
}