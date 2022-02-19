<?php

namespace App\Models;

use CodeIgniter\Model;

class AppointmentModel extends Model
{
    protected $table = 'ph';
    protected $primaryKey = 'idPH';
    protected $allowedFields = [
        'idPH',
        'idBenhNhan',
        'maDichVu',
        'idBacSi',
        'lichHenKham',
        'ngayLapPH',
        'moTa',
        'tinhTrangPH',
    ];
}