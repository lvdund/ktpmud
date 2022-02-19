<?php

namespace App\Models;

use CodeIgniter\Model;

class UncheckAppoinmentModel extends Model
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
        'tinhTrangPH',
    ];


    public function full()
    {
        $builder = $this->db->table('ph');
        $builder->select('*');
        $builder->join('tbenhnhan', 'tbenhnhan.idBenhNhan = ph.idBenhNhan');
        $builder->join('dichvu', 'dichvu.maDichVu = ph.maDichVu');
        $query = $builder->get();
        return $query->getResult();
    }
}