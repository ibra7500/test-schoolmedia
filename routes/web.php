<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home;
use App\Http\Controllers\Login;
use App\Http\Controllers\Register;
use App\Http\Controllers\Dashboard;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [Home::class, 'index'])->name('home');
Route::get('/login', [Login::class, 'index'])->name('login');
Route::post('/login', [Login::class, 'login']);
Route::get('/registrasi', [Register::class, 'index'])->name('registrasi');
Route::post('/register', [Register::class, 'store']);

Route::group(['middleware' => 'auth', 'ceklevel: admin, siswa'], function () {
    Route::get('/dashboard', [Dashboard::class, 'index'])->name('dashboard');
    Route::get('/dashboard/kelas', [Dashboard::class, 'kelas'])->name('dashboard.listkelas');
    Route::group(['middleware' => 'auth', 'ceklevel: admin'], function () {

        // Kelas
        Route::get('/dashboard/kelas/tambah', [Dashboard::class, 'tambah_kelas'])->name('dashboard.tambah_kelas');       
        Route::post('/dashboard/kelas/aksi_tambah', [Dashboard::class, 'aksi_tambah_kelas'])->name('kelas.insert');       
        Route::get('/dashboard/kelas/edit/{id_kelas}', [Dashboard::class, 'edit_kelas'])->name('dashboard.edit_kelas');       
        Route::patch('/dashboard/kelas/aksi_edit_kelas/{id_kelas}', [Dashboard::class, 'aksi_edit_kelas'])->name('kelas.edit');
        Route::get('/dashboard/kelas/delete_kelas/{id_kelas}', [Dashboard::class, 'delete_kelas'])->name('kelas.delete');

        // Siswa
        Route::get('/dashboard/siswa', [Dashboard::class, 'siswa'])->name('dashboard.listsiswa');
        Route::get('/dashboard/siswa/tambah', [Dashboard::class, 'tambah_siswa'])->name('dashboard.tambah_siswa');       
        Route::post('/dashboard/siswa/aksi_tambah', [Dashboard::class, 'aksi_tambah_siswa'])->name('siswa.insert');       
        Route::get('/dashboard/siswa/edit/{nisn}', [Dashboard::class, 'edit_siswa'])->name('dashboard.edit_siswa');       
        Route::patch('/dashboard/siswa/aksi_edit_siswa/{nisn}', [Dashboard::class, 'aksi_edit_siswa'])->name('siswa.edit');
        Route::get('/dashboard/siswa/delete_siswa/{nisn}', [Dashboard::class, 'delete_siswa'])->name('siswa.delete');

        // Posts
        Route::get('/dashboard/posts', [Dashboard::class, 'posts'])->name('dashboard.listposts');
        Route::get('/dashboard/posts/tambah', [Dashboard::class, 'tambah_posts'])->name('dashboard.tambah_posts');
        Route::post('/dashboard/posts/aksi_tambah', [Dashboard::class, 'aksi_tambah_posts'])->name('posts.insert');      
        Route::get('/dashboard/posts/edit/{id}', [Dashboard::class, 'edit_posts'])->name('dashboard.edit_posts');
        Route::patch('/dashboard/posts/aksi_edit_posts/{id}', [Dashboard::class, 'aksi_edit_posts'])->name('posts.edit');
        Route::get('/dashboard/posts/delete_posts/{id}', [Dashboard::class, 'delete_posts'])->name('posts.delete');
             
    }
    );
    // Edit Profile User
    Route::get('/dashboard/profile/', [Dashboard::class, 'profile'])->name('dashboard.profile');
    Route::patch('/dashboard/profile', [Dashboard::class, 'aksi_edit_profile'])->name('profile.edit');
         
}
);
Route::get('/sambutan', [Home::class, 'sambutan'])->name('sambutan');
Route::get('/visidanmisi', [Home::class, 'visimisi'])->name('visimisi');
Route::get('/sejarah', [Home::class, 'sejarah'])->name('sejarah');
Route::get('/tentang', [Home::class, 'tentang'])->name('tentang');

Route::post('logout', [Login::class, 'logout'])->name('logout');
