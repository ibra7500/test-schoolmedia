<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Siswa_Model;

class CreateSiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $siswa = [
            [
                'nisn' => '87612134',
                'nama' => 'Mohammad Rahadyan Ibrahim',
                'alamat' => 'Jl. Akasia K2',
                'no_telp' => '08123456789',
                'jenis_kelamin' => 'Laki-laki',
                'tanggal_lahir' => '2000-01-11',
            ],
            [
                'nisn' => '87612135',
                'nama' => 'Ibrahim Rahadyan',
                'alamat' => 'Jl. Akasia K3',
                'no_telp' => '08123456788',
                'jenis_kelamin' => 'Laki-laki',
                'tanggal_lahir' => '2000-01-12',
            ],
            [
                'nisn' => '87612136',
                'nama' => 'Rahadyan Ibrahim',
                'alamat' => 'Jl. Akasia K4',
                'no_telp' => '08123456787',
                'jenis_kelamin' => 'Laki-laki',
                'tanggal_lahir' => '2000-01-13',
            ],
        ];
        foreach ($siswa as $key => $value) {
            Siswa_Model::create($value);
        }
    }
}
