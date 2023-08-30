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
