<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Siswa_Model;

class Register extends Controller{
    
    public function index(){
        return view('register.index');
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'nisn' => 'required|min:8|max:8|unique:users',
            'nama' => 'required|max:255|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:6',
            'alamat' => 'required|max:255',
            'no_telp' => 'required|max:15',
            'jenis_kelamin' => 'required|max:9',
            'tanggal_lahir' => 'required|date',
        ]);

        // insert data ke table user
        $validatedData['password'] = bcrypt($validatedData['password']);
        $user = new User();
        $user->nisn = $validatedData['nisn'];
        $user->nama = $validatedData['nama'];
        $user->email = $validatedData['email'];
        $user->password = $validatedData['password'];
        $user->alamat = $validatedData['alamat'];
        $user->no_telp = $validatedData['no_telp'];
        $user->jenis_kelamin = $validatedData['jenis_kelamin'];
        $user->tanggal_lahir = $validatedData['tanggal_lahir'];
        $user->save();

        
        // Cek apakah user sudah terdaftar sebagai siswa
        $data = DB::table('siswa')->where('nisn', $validatedData['nisn'])->count();
        if ($data == 0) {
            //insert data ke table siswa
            $siswa = new Siswa_Model();
            $siswa->nisn = $validatedData['nisn'];
            $siswa->nama = $validatedData['nama'];
            $siswa->alamat = $validatedData['alamat'];
            $siswa->no_telp = $validatedData['no_telp'];
            $siswa->jenis_kelamin = $validatedData['jenis_kelamin'];
            $siswa->tanggal_lahir = $validatedData['tanggal_lahir'];
            $siswa->save();
        }


        // $request->session()->flash('success', 'Berhasil Registrasi!');
        $user->notify(new \App\Notifications\WelcomeEmailNotification());
        
        return redirect()->route('login')->with('success', 'Berhasil Registrasi!');
    }
}