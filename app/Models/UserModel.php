<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'tbenhnhan';
    protected $primaryKey = 'idBenhNhan';
    protected $allowedFields = [
        'idBenhNhan',
        'tenBenhNhan',
        'gioiTinhBenhNhan',
        'dobBenhNhan',
        'sdtBenhNhan',
        'tkBenhNhan',
        'mkBenhNhan',
    ];  
}