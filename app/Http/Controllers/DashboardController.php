<?php

namespace App\Http\Controllers;

use App\Models\PCNU;
use App\Models\Banom;
use App\Models\MWCNU;
use App\Models\Lembaga;
use App\Models\Ranting;
use App\Models\AnakRanting;
use App\Models\Pengurus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'username' => session()->get('nama_user'),
            'from' => 'Jawa Barat',
            'jml_pc' => PCNU::count(),
            'jml_mwc' => MWCNU::count(),
            'jml_ranting' => Ranting::count(),
            'jml_anak_ranting' => AnakRanting::count(),
            'jml_banom_pw' => Banom::select('*')->where('id_pwnu',1)->count(),
            'jml_lembaga_pw' => Lembaga::select('*')->where('id_pwnu',1)->count(),
            'total_banom' => Banom::count(),
            'total_lembaga' => Lembaga::count(),
            'pengurus_pwnu' => $this->countPengurus('id_pwnu'),
            'pengurus_pcnu' => $this->countPengurus('id_pcnu'),
            'pengurus_mwcnu' => $this->countPengurus('id_mwcnu'),
            'pengurus_ranting' => $this->countPengurus('id_ranting'),
            'pengurus_anak_ranting' => $this->countPengurus('id_anak_ranting')
        ];

        return view('pages.dashboard',$data);
    }

    private function countPengurus(string $reference_column) : int
    {
        return Pengurus::query()
            ->join('surat_keputusan as sk', 'sk.id', '=', 'pengurus.id_sk')
            ->whereNot($reference_column, null)
            ->where('tanggal_berakhir', '>', date('Y-m-d'))
            ->count();
    }
}
