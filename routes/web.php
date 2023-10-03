<?php

use App\Http\Controllers\AnakRantingController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PcnuController;
use App\Http\Controllers\PwnuController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserGroupController;
use App\Http\Controllers\MwcController;
use App\Http\Controllers\RantingController;
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
Route::any('/Login', [LoginController::class, 'Login'])->name('login');
Route::get('/wilayah', [Controller::class, 'getSingleAddress']);
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::prefix('pwnu')->group(function () {
    Route::get('/', [PwnuController::class, 'index'])->name('pwnu');
});

Route::prefix('pcnu')->group(function () {
    Route::get('/', [PcnuController::class, 'index'])->name('pcnu');
    Route::get('/detail', [PcnuController::class, 'detailPcnu'])->name('pcnu-detail');
    Route::get('/update/{id_pc}', [PcnuController::class, 'getPcnu'])->name('pcnu-update');
    Route::get('/add', [PcnuController::class, 'addPcnu'])->name('pcnu-add');
    Route::post('/process', [PcnuController::class, 'process'])->name('pcnu-process');
    Route::get('/delete/{id_pc}', [PcnuController::class, 'deletePcnu'])->name('pcnu-delete');
});

Route::prefix('mwcnu')->group(function () {
    Route::get('/getmwcByPcnu', [PcnuController::class, 'getmwcByPcnu'])->name('mwc-list-bypcnu');
    Route::get('/detail', [MwcController::class, 'index'])->name('mwcnu');
    Route::get('/add', [MwcController::class, 'addMwcnu'])->name('mwcnu-add');
    Route::post('/process', [MwcController::class, 'process'])->name('mwcnu-process');
    Route::get('/delete', [MwcController::class, 'deleteMwcnu'])->name('mwcnu-delete');
});

Route::prefix('ranting')->group(function () {
    Route::get('/getRantingByMwc', [MwcController::class, 'getRantingByMwc'])->name('ranting-list-bymwc');
    Route::get('/detail', [RantingController::class, 'index'])->name('ranting');
    Route::get('/add', [RantingController::class, 'addRanting'])->name('ranting-add');
    Route::post('/process', [RantingController::class, 'process'])->name('ranting-process');
    Route::get('/delete', [RantingController::class, 'deleteRanting'])->name('ranting-delete');
});

Route::prefix('anak-ranting')->group(function () {
    Route::get('/getListByRanting', [RantingController::class, 'getListByRanting'])->name('anak-ranting-list');
    Route::get('/detail', [AnakRantingController::class, 'index'])->name('anak-ranting');
    Route::get('/add', [AnakRantingController::class, 'addAnakRanting'])->name('anak-ranting-add');
    Route::post('/process', [AnakRantingController::class, 'process'])->name('anak-ranting-process');
    Route::get('/delete', [AnakRantingController::class, 'deleteAnakRanting'])->name('anak-ranting-delete');
});

Route::prefix('user-group')->group(function () {
    Route::get('/', [UserGroupController::class, 'index'])->name('user-group');
    Route::get('/add', [UserGroupController::class, 'addUserGroup'])->name('add-user-group');
    Route::post('/process', [UserGroupController::class, 'process'])->name('process-user-group');
});

// Exception view
Route::get('no-found', function () {
    return view('errors.not_found');
})->name('not-found');

