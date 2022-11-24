<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'username' => 'admin',
                'password' => password_hash('12345678', PASSWORD_BCRYPT),
                'nama' => 'Administrator',
                'level' => ('admin'),
                'is_aktif' => ('1'),
                'created_at' => Time::now()
            ],
            [
                'username' => 'hanan',
                'password' => password_hash('12345678', PASSWORD_BCRYPT),
                'nama' => 'Hanan askarim',
                'level' => ('kasir'),
                'is_aktif' => ('1'),
                'created_at' => Time::now()
            ],
            [
                'username' => 'burhan',
                'password' => password_hash('12345678', PASSWORD_BCRYPT),
                'nama' => 'Burhan muafi',
                'level' => ('owner'),
                'is_aktif' => ('1'),
                'created_at' => Time::now()
            ]
        ];

        $this->db->table('users')->insertBatch($data);
    }
}
