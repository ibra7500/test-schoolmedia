<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = [
            [
                'nama' => 'Admin',
                'email' => 'adminschool@email.com',
                'level' => 'admin',
                'password' => bcrypt('admin'),
                'tanggal_lahir' => "1990-01-01",
                'jenis_kelamin' => "Laki-laki",
                'alamat' => "Jl. Kebon Kacang",
                'no_telp' => "08123456789",
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
