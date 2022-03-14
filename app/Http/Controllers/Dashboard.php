<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests\UpdateProfileRequest;

class Dashboard extends Controller
{
    //
    public function index() {
        return view('admin.index');
    }
    // Kelas 
    public function kelas() {
        $kelas = DB::table('kelas')->orderBy('id_kelas', 'asc')->get();
        $title = 'List Data Kelas';
        return view('admin.kelas.index', ['kelas' => $kelas], ['title' => $title]);
    }

    public function tambah_kelas() {
        $title = 'Tambah Data Kelas';
        return view('admin.kelas.add', ['title' => $title]);
    }

    public function aksi_tambah_kelas(Request $request) {

        $validatedData = $request->validate([
            'id_kelas' => 'required|min:3|max:10|unique:kelas',
            'nama_kelas' => 'required|max:500|unique:kelas',
        ]
        );

        $query = DB::table('kelas')->insert(
            [
            'id_kelas' => $_POST['id_kelas'],   
            'nama_kelas' => $_POST['nama_kelas'], 
            ] );
        return redirect()->route('dashboard.listkelas')->with('success', 'Data Kelas Berhasil Ditambahkan!');
    }

    public function edit_kelas($id_kelas) {
        $kelas = DB::table('kelas')->where('id_kelas', $id_kelas)->first();
        $title = 'Update Data Kelas';
        return view('admin.kelas.edit', ['title' => $title], ['kelas' => $kelas]);
    }

    public function aksi_edit_kelas (Request $request, $id_kelas) {
        $query = DB::table('kelas')->where('id_kelas', $id_kelas)->update(
            [
            'id_kelas' => $_POST['id_kelas'],   
            'nama_kelas' => $_POST['nama_kelas'], 
            ] );
        return redirect()->route('dashboard.listkelas')->with('success', 'Data Kelas Berhasil Diupdate!');
    }

    public function delete_kelas ($id_kelas) {

        $data = DB::table('siswa')->where('id_kelas', $id_kelas)->get();
        if ($data->count() > 0) {
            return redirect()->route('dashboard.listkelas')->with('error', 'Data Kelas Tidak Bisa Dihapus, Karena Masih Terdapat Siswa!');
        } else {
            $query = DB::table('kelas')->where('id_kelas', $id_kelas)->delete();
            return redirect()->route('dashboard.listkelas')->with('success', 'Data Kelas Berhasil Dihapus!');
        }
    }

    // Siswa

    public function siswa() {
        $siswa = DB::table('siswa')
        ->select('siswa.*', 'kelas.nama_kelas as nama_kelas')
        ->leftJoin('kelas', 'siswa.id_kelas', '=', 'kelas.id_kelas')
        ->orderBy('nisn', 'asc')
        ->get();
        $title = 'List Data Siswa';
        return view('admin.siswa.index', ['siswa' => $siswa], ['title' => $title]);
    }

    public function tambah_siswa() {
        $kelas = DB::table('kelas')->orderBy('id_kelas', 'asc')->get();
        $title = 'Tambah Data Siswa';
        return view('admin.siswa.add', ['title' => $title], ['kelas' => $kelas]);
    }

    public function aksi_tambah_siswa(Request $request) {

        $validatedData = $request->validate([
            'nisn' => 'required|min:8|max:8|unique:siswa',
            'nama' => 'required|max:255|unique:siswa',
            'alamat' => 'required|max:255',
            'no_telp' => 'required|max:15',
            'jenis_kelamin' => 'required|max:9',
            'tanggal_lahir' => 'required|date',
        ]
        );

        $query = DB::table('siswa')->insert(
            [
            'nisn' => $request->input('nisn'), 
            'nama' => $request->input('nama'), 
            'alamat' => $request->input('alamat'),
            'no_telp' => $request->input('no_telp'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'tanggal_lahir' => $request->input('tanggal_lahir'),
            'id_kelas' => $request->input('id_kelas'),
            ] );
        // dd($request->all());
        return redirect()->route('dashboard.listsiswa')->with('success', 'Data Siswa Berhasil Ditambahkan!');
    }

    public function edit_siswa($nisn) {
        $siswa = DB::table('siswa')->where('nisn', $nisn)->first();
        $kelas = DB::table('kelas')->orderBy('id_kelas', 'asc')->get();
        $title = 'Update Data Siswa';

        return view('admin.siswa.edit', ['title' => $title], compact('siswa', 'kelas'));
    }
    
    public function aksi_edit_siswa (Request $request, $nisn) {

        $validatedData = $request->validate([
            'nama' => 'required|max:255|',
            'alamat' => 'required|max:255',
            'no_telp' => 'required|max:15',
            'jenis_kelamin' => 'required|max:9',
            'tanggal_lahir' => 'required|date',
        ]
        );

        $query = DB::table('siswa')->where('nisn', $nisn)->update(
            [ 
            'nama' => $request->input('nama'), 
            'alamat' => $request->input('alamat'),
            'no_telp' => $request->input('no_telp'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'tanggal_lahir' => $request->input('tanggal_lahir'),
            'id_kelas' => $request->input('id_kelas'),
            ] );
         
        return redirect()->route('dashboard.listsiswa')->with('success', 'Data Siswa Berhasil Diupdate!');
    }

    public function delete_siswa ($nisn) {
        $query = DB::table('siswa')->where('nisn', $nisn)->delete();
        $query1 = DB::table('users')->where('nisn', $nisn)->delete();
        return redirect()->route('dashboard.listsiswa')->with('success', 'Data Siswa Berhasil Dihapus!');
    }

    // Profile

    public function profile (Request $request) {
        $title = 'Profile';
        return view('admin.profile.index', ['user' => $request->user()], ['title' => $title]);
    }

    
    public function aksi_edit_profile(UpdateProfileRequest $request) {
        $request->user()->update($request->all());
        return redirect()->route('dashboard.profile')->with('success', 'Data Berhasil Diupdate!');
    }

    // Post

    public function posts () {
        $posts = DB::table('post')->orderBy('id', 'asc')->get();
        $title = 'Profile';
        return view('admin.sekolah.index', ['posts' => $posts], ['title' => $title]);
    }

    public function tambah_posts () {
        $title = 'Tambah Post';
        return view('admin.sekolah.add', ['title' => $title]);
    }

    public function aksi_tambah_posts(Request $request) {

        $validatedData = $request->validate([
            'title' => 'required|max:255|unique:post|string',
            'content' => 'required|string',
        ]
        );

        $query = DB::table('post')->insert(
            [
            'title' => $validatedData['title'], 
            'content' => $validatedData['content'], 
            ] );
        return redirect()->route('dashboard.listposts')->with('success', 'Data Berhasil Ditambahkan!');
    }

    public function edit_posts($id) {
        $posts = DB::table('post')->where('id', $id)->first();
        $title = 'Update Data Post';
        return view('admin.sekolah.edit', ['title' => $title], ['posts' => $posts]);
    }

    public function aksi_edit_posts (Request $request, $id) {

        $validatedData = $request->validate([
            'title' => 'required|max:255|',
            'content' => 'required|string',
        ]
        );

        $query = DB::table('post')->where('id', $id)->update(
            [
            'title' => $_POST['title'],   
            'content' => $_POST['content'], 
            ] );
        
        return redirect()->route('dashboard.listposts')->with('success', 'Data Berhasil Diupdate!');
    }

    public function delete_posts ($id) {
        $query = DB::table('post')->where('id', $id)->delete();
        return redirect()->route('dashboard.listposts')->with('success', 'Data Berhasil Dihapus!');
    }
}
