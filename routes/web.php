<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PcnuController;
use App\Http\Controllers\PwnuController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;

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
Route::any('/Login', [LoginController::class, 'Login'])->name('login');
Route::get('/wilayah', [Controller::class, 'getSingleAddress']);
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::prefix('pwnu')->group(function () {
    Route::get('/', [PwnuController::class, 'index'])->name('pwnu');
});

Route::prefix('pcnu')->group(function () {
    Route::get('/list', [PcnuController::class, 'index'])->name('pcnu');
    Route::get('/get', [PcnuController::class, 'getPcnu'])->name('pcnu-get');
    Route::get('/add', [PcnuController::class, 'addPcnu'])->name('pcnu-add');
    Route::get('/detail', [PcnuController::class, 'getDetail'])->name('pcnu-detail');
    Route::post('/process', [PcnuController::class, 'process'])->name('pcnu-process');
    Route::post('/delete', [PcnuController::class, 'process'])->name('pcnu-delete');
});

Route::get('pwnu', function () {
    return view('pages.pwnu',[
        'title'=> 'PWNU',
        'username'=>'John Doe',
        'from'=>'Jawa Barat',
        'name'=>'PWNU Jawa Barat'
    ]);
});

Route::get('mwcnu', function () {
    return view('pages.mwcnu',[
        'title'=> 'MWCNU',
        'username'=>'John Doe',
        'from'=>'Jawa Barat',
    ]);
});
Route::get('ranting', function () {
    return view('pages.ranting',[
        'title'=> 'Ranting',
        'username'=>'John Doe',
        'from'=>'Jawa Barat',
    ]);
});
Route::get('anak-ranting', function () {
    return view('pages.anakranting',[
        'title'=> 'Anak Ranting',
        'username'=>'John Doe',
        'from'=>'Jawa Barat',
    ]);
});
Route::get('edit-pwnu', function () {
    return view('pages..edit.edit-pwnu',[
        'title'=> 'Edit PWNU',
        'username'=>'John Doe',
        'from'=>'Jawa Barat',
    ]);
});
Route::get('detail-banom', function () {
    return view('pages.detail-banom',[
        'title'=> 'detail-banom',
        'username'=>'John Doe',
        'from'=>'Jawa Barat',
    ]);
});
Route::get('add-pengurus', function () {
    return view('pages.add.add-pengurus',[
        'title'=> 'Edit Pengurus',
        'username'=>'John Doe',
        'from'=>'Jawa Barat',
    ]);
});
Route::get('pengurus', function () {
    return view('pages.pengurus',[
        'title'=> 'Pengurus',
        'username'=>'John Doe',
        'from'=>'Jawa Barat',
    ]);
});


Route::get('add-sk', function () {
    return view('pages.add.add-sk',[
        'title'=> 'Tambah SK',
        'username'=>'John Doe',
        'from'=>'Jawa Barat',
    ]);
});
Route::get('add-lembaga', function () {
    return view('pages.add.add-lembaga',[
        'title'=> 'Tambah Lembaga',
        'username'=>'John Doe',
        'from'=>'Jawa Barat',
    ]);
});
Route::get('add-banom', function () {
    return view('pages.add.add-banom',[
        'title'=> 'Tambah Banom',
        'username'=>'John Doe',
        'from'=>'Jawa Barat',
    ]);
});
Route::get('add-pcnu', function () {
    return view('pages.add.add-pcnu',[
        'title'=> 'Tambah PCNU',
        'username'=>'John Doe',
        'from'=>'Jawa Barat',
    ]);
});
Route::get('detail-pcnu', function () {
    return view('pages.detail-pcnu',[
        'title'=> 'Detail PCNU',
        'username'=>'John Doe',
        'from'=>'Jawa Barat',
    ]);
});
Route::get('add-mwc', function () {
    return view('pages.add.add-mwc',[
        'title'=> 'Detail PCNU',
        'username'=>'John Doe',
        'from'=>'Jawa Barat',
    ]);
});
Route::get('detail-mwc', function () {
    return view('pages.detail-mwc',[
        'title'=> 'Detail MWC NU',
        'username'=>'John Doe',
        'from'=>'Jawa Barat',
    ]);
});
Route::get('detail-ranting', function () {
    return view('pages.detail-ranting',[
        'title'=> 'Detail Ranting NU',
        'username'=>'John Doe',
        'from'=>'Jawa Barat',
    ]);
});
Route::get('add-ranting', function () {
    return view('pages.add.add-ranting',[
        'title'=> 'Tambah Ranting',
        'username'=>'John Doe',
        'from'=>'Jawa Barat',
    ]);
});
Route::get('add-anak-ranting', function () {
    return view('pages.add.add-anak-ranting',[
        'title'=> 'Tambah Anak Ranting',
        'username'=>'John Doe',
        'from'=>'Jawa Barat',
    ]);
});
Route::get('detail-anak-ranting', function () {
    return view('pages.detail-anak-ranting',[
        'title'=> 'Detail Anak Ranting',
        'username'=>'John Doe',
        'from'=>'Jawa Barat',
    ]);
});
Route::get('detail-sk', function () {
    return view('pages.detail-sk',[
        'title'=> 'Detail SK',
        'username'=>'John Doe',
        'from'=>'Jawa Barat',
    ]);
});
Route::get('detail-lembaga', function () {
    return view('pages.detail-lembaga',[
        'title'=> 'Detail Lembaga',
        'username'=>'John Doe',
        'from'=>'Jawa Barat',
    ]);
});
Route::get('detail-pengurus', function () {
    return view('pages.detail-pengurus',[
        'title'=> 'Detail Pengurus',
        'username'=>'John Doe',
        'from'=>'Jawa Barat',
    ]);
});
Route::get('add-user-group', function () {
    return view('pages.add.add-user-group',[
        'title'=> 'Tambah User Group',
        'username'=>'John Doe',
        'from'=>'Jawa Barat',
    ]);
});
Route::get('add-user', function () {
    return view('pages.add.add-user',[
        'title'=> 'Tambah User',
        'username'=>'John Doe',
        'from'=>'Jawa Barat',
    ]);
});
Route::get('user-group', function () {
    return view('pages.user-group',[
        'title'=> 'User Group',
        'username'=>'John Doe',
        'from'=>'Jawa Barat',
    ]);
});
Route::get('user', function () {
    return view('pages.user',[
        'title'=> 'User',
        'username'=>'John Doe',
        'from'=>'Jawa Barat',
    ]);
});
Route::get('detail-user-group', function () {
    return view('pages.detail-user-group',[
        'title'=> 'Detail User Group',
        'username'=>'John Doe',
        'from'=>'Jawa Barat',
    ]);
});
Route::get('detail-user', function () {
    return view('pages.detail-user',[
        'title'=> 'Detail User',
        'username'=>'John Doe',
        'from'=>'Jawa Barat',
    ]);
});
Route::get('detail-user', function () {
    return view('pages.detail-user',[
        'title'=> 'Detail User',
        'username'=>'John Doe',
        'from'=>'Jawa Barat',
    ]);
});
