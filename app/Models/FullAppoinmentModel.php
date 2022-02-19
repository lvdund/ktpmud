<?php

namespace App\Models;

use CodeIgniter\Model;

class FullAppoinmentModel extends Model
{
    protected $table = 'ph';
    protected $primaryKey = 'idPH';
    // protected $returnType = 'object';
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


    public function full()
    {
        $builder = $this->db->table('ph');
        $builder->select('*');
        $builder->join('tbenhnhan', 'tbenhnhan.idBenhNhan = ph.idBenhNhan');
        $builder->join('dichvu', 'dichvu.maDichVu = ph.maDichVu');
        $builder->join('tbacsi', 'tbacsi.idBacSi = ph.idBacSi');
        $query = $builder->get();
        return $query->getResult();
    }
}