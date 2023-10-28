<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MwcController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PcnuController;
use App\Http\Controllers\PwnuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BanomController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\LembagaController;
use App\Http\Controllers\RantingController;
use App\Http\Controllers\PengurusController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IndikatorController;
use App\Http\Controllers\UserGroupController;
use App\Http\Controllers\BanomBasisController;
use App\Http\Controllers\AnakRantingController;
use App\Http\Controllers\EditProfileController;
use App\Http\Controllers\MasterBanomController;
use App\Http\Controllers\JenisPengurusController;
use App\Http\Controllers\MasterLembagaController;
use App\Http\Controllers\SuratKeputusanController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::any('/Login', [LoginController::class, 'Login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/wilayah', [Controller::class, 'getSingleAddress']);
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/get-kecamatan/{kode}', [UserGroupController::class, 'getKecamatan']);

Route::get('/pwnu', [PwnuController::class, 'index'])->name('pwnu');

Route::prefix('pcnu')->group(function () {
    Route::get('/', [PcnuController::class, 'index'])->name('pcnu');
    Route::get('/detail', [PcnuController::class, 'detailPcnu'])->name('pcnu-detail');
    Route::get('/update/{id_pc}', [PcnuController::class, 'getPcnu'])->name('pcnu-update')->middleware('can_update');
    Route::get('/add', [PcnuController::class, 'addPcnu'])->name('pcnu-add')->middleware('can_create');
    Route::post('/process', [PcnuController::class, 'process'])->name('pcnu-process');
    Route::get('/delete/{id_pc}', [PcnuController::class, 'deletePcnu'])->name('pcnu-delete')->middleware('can_delete');
});

Route::prefix('mwcnu')->group(function () {
    Route::get('/getmwcByPcnu', [PcnuController::class, 'getmwcByPcnu'])->name('mwc-list-bypcnu');
    Route::get('/detail', [MwcController::class, 'index'])->name('mwcnu');
    Route::get('/add', [MwcController::class, 'addMwcnu'])->name('mwcnu-add')->middleware(['can_create', 'can_update']);
    Route::post('/process', [MwcController::class, 'process'])->name('mwcnu-process');
    Route::get('/delete', [MwcController::class, 'deleteMwcnu'])->name('mwcnu-delete')->middleware('can_delete');
});

Route::prefix('ranting')->group(function () {
    Route::get('/getRantingByMwc', [MwcController::class, 'getRantingByMwc'])->name('ranting-list-bymwc');
    Route::get('/detail', [RantingController::class, 'index'])->name('ranting');
    Route::get('/add', [RantingController::class, 'addRanting'])->name('ranting-add')->middleware(['can_create', 'can_update']);
    Route::post('/process', [RantingController::class, 'process'])->name('ranting-process');
    Route::get('/delete', [RantingController::class, 'deleteRanting'])->name('ranting-delete')->middleware('can_delete');
});

Route::prefix('anak-ranting')->group(function () {
    Route::get('/getListByRanting', [RantingController::class, 'getAnakByRanting'])->name('anak-ranting-list');
    Route::get('/detail', [AnakRantingController::class, 'index'])->name('anak-ranting');
    Route::get('/add', [AnakRantingController::class, 'addAnakRanting'])->name('anak-ranting-add')->middleware(['can_create', 'can_update']);
    Route::post('/process', [AnakRantingController::class, 'process'])->name('anak-ranting-process');
    Route::get('/delete', [AnakRantingController::class, 'deleteAnakRanting'])->name('anak-ranting-delete')->middleware('can_delete');
});

Route::prefix('user-group')->group(function () {
    Route::get('/', [UserGroupController::class, 'index'])->name('user-group');
    Route::get('/add', [UserGroupController::class, 'addUserGroup'])->name('add-user-group');
    Route::get('/update/{id_user_group}', [UserGroupController::class, 'getUserGroup'])->name('update-user-group');
    Route::post('/process', [UserGroupController::class, 'process'])->name('process-user-group');
    Route::get('/detail', [UserGroupController::class, 'detail'])->name('detail-user-group');
    Route::get('/delete/{id_ug}', [UserGroupController::class, 'delete'])->name('delete-user-group');
});

Route::prefix('user')->group(function () {
    Route::get('/',[UserController::class, 'index'])->name('user');
    Route::get('/addUser', [UserController::class, 'addUser'])->name('add-user');
    Route::get('/update/{id_user}', [UserController::class, 'getUser'])->name('update-user');
    Route::post('processUser', [UserController::class, 'process'])->name('process-user');
    Route::get('detail', [UserController::class, 'detail'])->name('detail-user');
    Route::get('/delete/{id_user}', [UserController::class, 'delete'])->name('delete-user');
});

Route::prefix('jenis-pengurus')->group(function () {
    Route::get('/', [JenisPengurusController::class, 'index'])->name('jenis_pengurus');
    Route::get('/add-jenis-pengurus', [JenisPengurusController::class, 'addJenisPengurus'])->name('add_jenis_pengurus');
    Route::get('/updated/{id_jp}', [JenisPengurusController::class, 'getJenisPengurus'])->name('update_jenis_pengurus');
    Route::post('/process', [JenisPengurusController::class, 'process'])->name('process_jenis_pengurus');
    Route::get('/detail/{id_jp}', [JenisPengurusController::class, 'detail'])->name('detail_jenis_pengurus');
    Route::get('/delete/{id_jp}', [JenisPengurusController::class, 'delete'])->name('delete_jenis_pengurus');
});

Route::prefix('jabatan')->group(function () {
    Route::get('/', [JabatanController::class, 'index'])->name('jabatan');
    Route::get('/add-jabatan', [JabatanController::class, 'addJabatan'])->name('add_jabatan');
    Route::get('/updated/{id}', [JabatanController::class, 'getJabatan'])->name('update_jabatan');
    Route::post('/process', [JabatanController::class, 'process'])->name('process_jabatan');
    Route::get('/detail/{id}', [JabatanController::class, 'detail'])->name('detail_jabatan');
    Route::get('/delete/{id}', [JabatanController::class, 'delete'])->name('delete_jabatan');
});

Route::prefix('master-banom')->group(function () {
    Route::get('/', [MasterBanomController::class, 'index'])->name('master-banom');
    Route::get('/add-master-banom', [MasterBanomController::class, 'addMasterBanom'])->name('add_master_banom');
    Route::get('/updated/{id_mb}', [MasterBanomController::class, 'getMasterBanom'])->name('update_master_banom');
    Route::post('/process', [MasterBanomController::class, 'process'])->name('process_mater_banom');
    Route::get('/detail/{id_mb}', [MasterBanomController::class, 'detail'])->name('detail_master_banom');
    Route::get('/delete/{id_mb}', [MasterBanomController::class, 'delete'])->name('delete_master_banom');
});

Route::prefix('master-lembaga')->group(function () {
    Route::get('/', [MasterLembagaController::class, 'index'])->name('master-lembaga');
    Route::get('/add-master-lembaga', [MasterLembagaController::class, 'addMasterLembaga'])->name('add_master_lembaga');
    Route::get('/updated/{id_ml}', [MasterLembagaController::class, 'getMasterLembaga'])->name('update_master_lembaga');
    Route::post('/process', [MasterLembagaController::class, 'process'])->name('process_master_lembaga');
    Route::get('/detail/{id_ml}', [MasterLembagaController::class, 'detail'])->name('detail_master_lembaga');
    Route::get('/delete/{id_ml}', [MasterLembagaController::class, 'delete'])->name('delete_master_lembaga');
});

Route::prefix('banom-basis')->group(function () {
    Route::get('/', [BanomBasisController::class, 'index'])->name('banom-basis');
    Route::get('/add-banom-basis', [BanomBasisController::class, 'addBanomBasis'])->name('add_banom_basis');
    Route::get('/updated/{id_bb}', [BanomBasisController::class, 'getBanomBasis'])->name('update_banom_basis');
    Route::post('/process', [BanomBasisController::class, 'process'])->name('process_banom_basis');
    Route::get('/detail/{id_bb}', [BanomBasisController::class, 'detail'])->name('detail_banom_basis');
    Route::get('/delete/{id_bb}', [BanomBasisController::class, 'delete'])->name('delete_banom_basis');
});

Route::prefix('indikator')->group(function () {
    Route::get('/', [IndikatorController::class, 'index'])->name('indikator');
    Route::get('/add-indikator', [IndikatorController::class, 'addIndikator'])->name('add_indikator');
    Route::get('/updated/{id_i}', [IndikatorController::class, 'getIndikator'])->name('update_indikator');
    Route::post('/process', [IndikatorController::class, 'process'])->name('process_indikator');
    Route::get('/detail/{id_i}', [IndikatorController::class, 'detail'])->name('detail_indikator');
    Route::get('/delete/{id_i}', [IndikatorController::class, 'delete'])->name('delete_indikator');
    Route::get('/add-review', [IndikatorController::class, 'addReview'])->name('add-review');
    Route::post('/process-review', [IndikatorController::class, 'processReview'])->name('process-review');

    Route::get('/add_uraian', [IndikatorController::class, 'addUraian'])->name('add_uraian');
    Route::post('/process_uraian', [IndikatorController::class, 'processUraian'])->name('process_uraian');
});

Route::prefix('lembaga')->group(function () {
    Route::get('/list', [LembagaController::class, 'getLembagalist'])->name('lembaga-list');
    Route::get('/detail', [LembagaController::class, 'index'])->name('lembaga');
    Route::get('/add', [LembagaController::class, 'addLembaga'])->name('lembaga-add');
    Route::post('/process', [LembagaController::class, 'process'])->name('lembaga-process');
    Route::get('/delete', [LembagaController::class, 'deleteLembaga'])->name('lembaga-delete');
});

Route::prefix('banom')->group(function () {
    Route::get('/list', [BanomController::class, 'getBanomlist'])->name('Banom-list');
    Route::get('/detail', [BanomController::class, 'index'])->name('Banom');
    Route::get('/add', [BanomController::class, 'addBanom'])->name('Banom-add');
    Route::post('/process', [BanomController::class, 'process'])->name('Banom-process');
    Route::get('/delete', [BanomController::class, 'deleteBanom'])->name('Banom-delete');
});
Route::get('search-data', function () {
    return view('pages.search-data',[
        'title'=> 'Search Data',
        'username' => 'jhone Doe',
        'from' => 'Tasik',
    ]);
});
Route::prefix('sk')->group(function () {
    Route::get('/list', [SuratKeputusanController::class, 'getSklist'])->name('Sk-list');
    // Route::get('/', [SuratKeputusanController::class, 'index'])->name('sk');
    Route::get('/add_sk', [SuratKeputusanController::class, 'add_sk'])->name('add_sk');
    Route::post('/process', [SuratKeputusanController::class, 'process'])->name('sk_process');
    Route::get('/detail', [SuratKeputusanController::class, 'detail'])->name('sk_detail');
    Route::get('/file', [SuratKeputusanController::class, 'download'])->name('download_sk');
});

Route::prefix('pengurus')->group(function () {
    Route::get('/list', [PengurusController::class, 'listPengurus'])->name('pengurus-list');
    Route::get('/add_pengurus', [PengurusController::class, 'index'])->name('add_pengurus');
    Route::post('/process', [PengurusController::class, 'process'])->name('pengurus_process');
    Route::post('/delete', [PengurusController::class, 'delete'])->name('del_pengurus');
});

Route::prefix('anggota')->group(function () {
    Route::get('/', [EditProfileController::class, 'index'])->name('pengurus');
    Route::get('/detail', [EditProfileController::class, 'detail'])->name('detail_pengurus');
    Route::get('/getPengurus', [EditProfileController::class, 'getPengurus'])->name('getPengurus');
    Route::post('/update', [EditProfileController::class, 'edit'])->name('edit');
});

// Route::get('/review_pcnu', function () {
//     return view('pages.add.add-review-pcnu', [
//         'title'=> 'PWNU',
//         'username'=>'John Doe',
//         'from'=>'Jawa Barat',
//         'name'=>'PWNU Jawa Barat'
//     ]);
// })->name('add-review');
Route::get('/review_mwcnu', function () {
    return view('pages.add.add-review-mwc', [
        'title'=> 'PWNU',
        'username'=>'John Doe',
        'from'=>'Jawa Barat',
        'name'=>'PWNU Jawa Barat'
    ]);
})->name('add-review-mwc');


// Route::get('/add_sk', function () {
//     return view('pages.add.add-pengurus', [
//         'title'=> 'PWNU',
//         'username'=>'John Doe',
//         'from'=>'Jawa Barat',
//         'name'=>'PWNU Jawa Barat'
//     ]);
// })->name('add_pengurus');

// Route::get('/pengurus', function () {
//     return view('pages.pengurus', [
//         'title'=> 'PWNU',
//         'username'=>'John Doe',
//         'from'=>'Jawa Barat',
//         'name'=>'PWNU Jawa Barat'
//     ]);
// })->name('pengurus');

// Route::get('/detail_pengurus', function () {
//     return view('pages.detail-pengurus', [
//         'title'=> 'PWNU',
//         'username'=>'John Doe',
//         'from'=>'Jawa Barat',
//         'name'=>'PWNU Jawa Barat'
//     ]);
// })->name('detail_pengurus');

Route::get('add-review-pcnu', function () {
    return view('pages.add.add-review-pcnu',[
        'title'=> 'Reviews',
        'username'=>'John Doe',
        'from'=>'Jawa Barat',
        'name'=>'PWNU Jawa Barat'
    ]);
});

// Exception view
Route::get('no-found', function () {
    return view('errors.not_found');
})->name('not-found');

