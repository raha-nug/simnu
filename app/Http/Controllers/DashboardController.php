<?php

namespace App\Http\Controllers;

use App\Models\PCNU;
use App\Models\Banom;
use App\Models\MWCNU;
use App\Models\Lembaga;
use App\Models\Ranting;
use App\Models\AnakRanting;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $jml_pc = PCNU::count();
        $jml_mwc = MWCNU::count();
        $jml_ranting = Ranting::count();
        $jml_anak_ranting = AnakRanting::count();
        $jml_banom = Banom::count();
        $jml_lembaga = Lembaga::count();
        $jml_banom_pw = Banom::select('*')->where('id_pwnu',1)->count();
        $jml_lembaga_pw = Lembaga::select('*')->where('id_pwnu',1)->count();
        $data = [
            'title' => 'Dashboard',
            'username' => session()->get('nama_user'),
            'from' => 'Jawa Barat',
            'jml_pc' => $jml_pc,
            'jml_mwc' => $jml_mwc,
            'jml_ranting' => $jml_ranting,
            'jml_anak_ranting' => $jml_anak_ranting,
            'jml_banom_pw' => $jml_banom_pw,
            'jml_lembaga_pw' => $jml_lembaga_pw,
            'jml_banom' => $jml_banom,
            'jml_lembaga' => $jml_lembaga,
        ];

        return view('pages.dashboard',$data);
    }
}
