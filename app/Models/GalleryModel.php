<?php namespace App\Models;
use CodeIgniter\Model;

class GalleryModel extends Model {
    protected $table = 'galleries';
    protected $allowedFields = ['image_path', 'caption'];
}