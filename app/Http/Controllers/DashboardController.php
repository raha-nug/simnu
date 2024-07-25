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
        $jml_pc = count(PCNU::all());
        $jml_mwc = count(MWCNU::all());
        $jml_ranting = count(Ranting::all());
        $jml_anak_ranting = count(AnakRanting::all());
        $jml_banom = count(Banom::all());
        $jml_lembaga = count(Lembaga::all());
        $jml_banom_pw = count(Banom::select('*')->where('id_pwnu',1)->get());
        $jml_lembaga_pw = count(Lembaga::select('*')->where('id_pwnu',1)->get());
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
