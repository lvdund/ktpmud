<?php

namespace App\Models;

use CodeIgniter\Model;

class DoctorModel extends Model
{
    protected $table = 'tbacsi';
    protected $primaryKey = 'idBacSi';
    protected $allowedFields = [
        'idBacSi',
        'tenKhoa',
        'tenBacSi',
        'gioiTinhBacSi',
        'dobBacSi',
        'bangCap',
        'sdtBacSi',
        'tkBacSi',
        'mkBacSi',
    ];
}