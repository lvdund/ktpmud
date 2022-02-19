<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data=[
            [
                'email' => 'admin@gmail.com',
                'password' => password_hash('123123', PASSWORD_BCRYPT),
                'name' => 'Lal Da Louisa',
            ],
            [
                'email' => 'user@gmail.com',
                'password' => password_hash('1223123', PASSWORD_BCRYPT),
                'name' => 'Leonardo Hitler',
            ]
        ];

        $this->db->table('users')->insertBatch($data);
    }
}
