<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run():void
    {
        $dataUser = [
            [
                'name' => 'siswa',
                'email' => 'siswa@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 'siswa',
            ],
            [
                'name' => 'guru',
                'email' => 'guru@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 'guru',
            ],
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 'admin',
            ],
        ];
        foreach ($dataUser as $key => $val){
            User::create($val);
        }
    }
}
