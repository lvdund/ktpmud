<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PurchaseSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name'=>'Dung thu',
                'price'=>'$0/MONTH',
                'email_address'=>'250',
                'storage'=>'125GB',
                'databases'=>'140',
                'domains'=>'60',
                'support'=>'24/7 trong ngay'
            ],
            [
                'name'=>'Goi thanh toan theo nam',
                'price'=>'$400/MONTH',
                'email_address'=>'150',
                'storage'=>'125GB',
                'databases'=>'60',
                'domains'=>'30',
                'support'=>'24/7 trong ngay'
            ],
            [
                'name'=>'Vinh vien',
                'price'=>'$5000/1 LAN DUY NHAT',
                'email_address'=>'250',
                'storage'=>'125GB',
                'databases'=>'140',
                'domains'=>'60',
                'support'=>'24/7 trong ngay'
            ],
        ];
        $this->db->table('purchases')->insertBatch($data);
    }
}
