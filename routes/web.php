<?php

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
Route::get('/login', function () {
    return view('login');
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
Route::get('/admin/lembaga', function () {
    return view('pages.lembaga',[
        'title'=> 'Lembaga',
        'username'=>'John Doe',
        'from'=>'Jawa Barat', 
    ]);
});
Route::get('/admin/banom', function () {
    return view('pages.banom',[
        'title'=> 'Banom',
        'username'=>'John Doe',
        'from'=>'Jawa Barat', 
    ]);
});
Route::get('/admin/sadesha', function () {
    return view('pages.sadesha',[
        'title'=> 'Sadesha',
        'username'=>'John Doe',
        'from'=>'Jawa Barat', 
    ]);
});
Route::get('/admin/nu-award', function () {
    return view('pages.nuaward',[
        'title'=> 'NU Award',
        'username'=>'John Doe',
        'from'=>'Jawa Barat', 
    ]);
});


Route::get('/admin/add-sk', function () {
    return view('pages.add.add-sk',[
        'title'=> 'Tambah SK PWNU',
        'username'=>'John Doe',
        'from'=>'Jawa Barat', 
    ]);
});
Route::get('/admin/add-lembaga', function () {
    return view('pages.add.add-lembaga',[
        'title'=> 'Tambah Lembaga PWNU',
        'username'=>'John Doe',
        'from'=>'Jawa Barat', 
    ]);
});
Route::get('/admin/add-banom', function () {
    return view('pages.add.add-banom',[
        'title'=> 'Tambah Banom PWNU',
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