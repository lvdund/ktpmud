<?php

namespace App\Models;

use CodeIgniter\Model;

class DepartmentModel extends Model
{
    protected $table = 'tkhoa';
    protected $primaryKey = 'tenKhoa';
    protected $allowedFields = [
        'tenKhoa',
        'emailKhoa',
        'sdtKhoa',
        'idTruongKhoa',
        'tenTruongKhoa',
    ];
}