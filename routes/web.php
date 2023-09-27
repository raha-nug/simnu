<?php

use App\Http\Controllers\PwnuController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', [LoginController::class, 'Login'])->name('login');

Route::prefix('pwnu')->group(function () {
    Route::get('/', [PwnuController::class, 'index'])->name('pwnu');
});

Route::get('/admin/dashboard', function () {
    return view('pages.dashboard',[
        'title'=> 'Dashboard',
        'username'=>'John Doe',
        'from'=>'Jawa Barat',
    ]);
});
Route::get('/admin/pwnu', function () {
    return view('pages.pwnu',[
        'title'=> 'PWNU',
        'username'=>'John Doe',
        'from'=>'Jawa Barat',
        'name'=>'PWNU Jawa Barat'
    ]);
});
Route::get('/admin/pcnu', function () {
    return view('pages.pcnu',[
        'title'=> 'PCNU',
        'username'=>'John Doe',
        'from'=>'Jawa Barat',
    ]);
});
Route::get('/admin/mwcnu', function () {
    return view('pages.mwcnu',[
        'title'=> 'MWCNU',
        'username'=>'John Doe',
        'from'=>'Jawa Barat',
    ]);
});
Route::get('/admin/ranting', function () {
    return view('pages.ranting',[
        'title'=> 'Ranting',
        'username'=>'John Doe',
        'from'=>'Jawa Barat',
    ]);
});
Route::get('/admin/anak-ranting', function () {
    return view('pages.anakranting',[
        'title'=> 'Anak Ranting',
        'username'=>'John Doe',
        'from'=>'Jawa Barat',
    ]);
});
Route::get('/admin/edit-pwnu', function () {
    return view('pages..edit.edit-pwnu',[
        'title'=> 'Edit PWNU',
        'username'=>'John Doe',
        'from'=>'Jawa Barat',
    ]);
});
Route::get('/admin/detail-banom', function () {
    return view('pages.detail-banom',[
        'title'=> 'detail-banom',
        'username'=>'John Doe',
        'from'=>'Jawa Barat',
    ]);
});
Route::get('/admin/add-pengurus', function () {
    return view('pages.add.add-pengurus',[
        'title'=> 'Tambah Pengurus',
        'username'=>'John Doe',
        'from'=>'Jawa Barat',
    ]);
});
Route::get('/admin/pengurus', function () {
    return view('pages.pengurus',[
        'title'=> 'Pengurus',
        'username'=>'John Doe',
        'from'=>'Jawa Barat',
    ]);
});


Route::get('/admin/add-sk', function () {
    return view('pages.add.add-sk',[
        'title'=> 'Tambah SK',
        'username'=>'John Doe',
        'from'=>'Jawa Barat',
    ]);
});
Route::get('/admin/add-lembaga', function () {
    return view('pages.add.add-lembaga',[
        'title'=> 'Tambah Lembaga',
        'username'=>'John Doe',
        'from'=>'Jawa Barat',
    ]);
});
Route::get('/admin/add-banom', function () {
    return view('pages.add.add-banom',[
        'title'=> 'Tambah Banom',
        'username'=>'John Doe',
        'from'=>'Jawa Barat',
    ]);
});
Route::get('/admin/add-pcnu', function () {
    return view('pages.add.add-pcnu',[
        'title'=> 'Tambah PCNU',
        'username'=>'John Doe',
        'from'=>'Jawa Barat',
    ]);
});
Route::get('/admin/detail-pcnu', function () {
    return view('pages.detail-pcnu',[
        'title'=> 'Detail PCNU',
        'username'=>'John Doe',
        'from'=>'Jawa Barat',
    ]);
});
Route::get('/admin/add-mwc', function () {
    return view('pages.add.add-mwc',[
        'title'=> 'Detail PCNU',
        'username'=>'John Doe',
        'from'=>'Jawa Barat',
    ]);
});
Route::get('/admin/detail-mwc', function () {
    return view('pages.detail-mwc',[
        'title'=> 'Detail MWC NU',
        'username'=>'John Doe',
        'from'=>'Jawa Barat',
    ]);
});
Route::get('/admin/detail-ranting', function () {
    return view('pages.detail-ranting',[
        'title'=> 'Detail Ranting NU',
        'username'=>'John Doe',
        'from'=>'Jawa Barat',
    ]);
});
Route::get('/admin/add-ranting', function () {
    return view('pages.add.add-ranting',[
        'title'=> 'Tambah Ranting',
        'username'=>'John Doe',
        'from'=>'Jawa Barat',
    ]);
});
Route::get('/admin/add-anak-ranting', function () {
    return view('pages.add.add-anak-ranting',[
        'title'=> 'Tambah Anak Ranting',
        'username'=>'John Doe',
        'from'=>'Jawa Barat',
    ]);
});
Route::get('/admin/detail-anak-ranting', function () {
    return view('pages.detail-anak-ranting',[
        'title'=> 'Detail Anak Ranting',
        'username'=>'John Doe',
        'from'=>'Jawa Barat',
    ]);
});
Route::get('/admin/detail-sk', function () {
    return view('pages.detail-sk',[
        'title'=> 'Detail SK',
        'username'=>'John Doe',
        'from'=>'Jawa Barat',
    ]);
});
Route::get('/admin/detail-lembaga', function () {
    return view('pages.detail-lembaga',[
        'title'=> 'Detail Lembaga',
        'username'=>'John Doe',
        'from'=>'Jawa Barat',
    ]);
});
Route::get('/admin/detail-pengurus', function () {
    return view('pages.detail-pengurus',[
        'title'=> 'Detail Pengurus',
        'username'=>'John Doe',
        'from'=>'Jawa Barat',
    ]);
});
Route::get('/admin/add-user-group', function () {
    return view('pages.add.add-user-group',[
        'title'=> 'Tambah User Group',
        'username'=>'John Doe',
        'from'=>'Jawa Barat',
    ]);
});
Route::get('/admin/add-user', function () {
    return view('pages.add.add-user',[
        'title'=> 'Tambah User',
        'username'=>'John Doe',
        'from'=>'Jawa Barat',
    ]);
});
Route::get('/admin/user-group', function () {
    return view('pages.user-group',[
        'title'=> 'User Group',
        'username'=>'John Doe',
        'from'=>'Jawa Barat',
    ]);
});
Route::get('/admin/user', function () {
    return view('pages.user',[
        'title'=> 'User',
        'username'=>'John Doe',
        'from'=>'Jawa Barat',
    ]);
});
Route::get('/admin/detail-user-group', function () {
    return view('pages.detail-user-group',[
        'title'=> 'Detail User Group',
        'username'=>'John Doe',
        'from'=>'Jawa Barat',
    ]);
});
Route::get('/admin/detail-user', function () {
    return view('pages.detail-user',[
        'title'=> 'Detail User',
        'username'=>'John Doe',
        'from'=>'Jawa Barat',
    ]);
});
