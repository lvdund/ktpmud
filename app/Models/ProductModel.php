<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'dichvu';
    protected $primaryKey = 'maDichVu';
    protected $allowedFields = [
        'maDichVu',
        'tenKhoa',
        'tenDichVu',
        'phiDichVu',
    ];
}