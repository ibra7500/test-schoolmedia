<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Home extends Controller{
    
    public function index(){
        return view('index');
    }

    public function visimisi() {
        $data = DB::table('post')->where('title', 'Visi dan Misi')->get();
        return view('visimisi', ['data' => $data]);
    }

    public function sambutan() {
        $data = DB::table('post')->where('title', 'Sambutan Kepala Sekolah')->get();
        return view('sambutan', ['data' => $data]);
    }

    public function sejarah() {
        $data = DB::table('post')->where('title', 'Sejarah')->get();
        return view('sejarah', ['data' => $data]);
    }

    public function kontak() {
        return view('kontak');
    }

    public function tentang() {
        $data = DB::table('post')->where('title', 'Tentang')->get();
        return view('tentang', ['data' => $data]);
    }
}