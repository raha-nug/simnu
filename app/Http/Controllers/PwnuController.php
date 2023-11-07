<?php

namespace App\Http\Controllers;

use App\Models\PWNU;
use App\Models\Pengurus;
use Illuminate\Http\Request;
use App\Models\SuratKeputusan;

class PwnuController extends Controller
{
    public function index()
    {
        $pw_detail = PWNU::query()->where('id', 1)->first();
        $sk = SuratKeputusan::query()->where('id_pwnu', $pw_detail->id)->get();
        $pengurus = Pengurus::join('surat_keputusan', 'pengurus.id_sk', '=', 'surat_keputusan.id')
                            ->join('PWNU', 'surat_keputusan.id_pwnu', '=', 'PWNU.id')
                            ->join('anggota', 'pengurus.nik', '=', 'anggota.nik')
                            ->where('PWNU.id', $pw_detail->id)
                            ->get();
        $data = [
            'title' => 'PWNU',
            'pw_detail' => $pw_detail,
            'username' => session()->get('nama_user'),
            'from' => 'Jawa Barat',
            'nomor' => $count = 1,
            'sk' => $sk,
            'pengurus' => $pengurus ?? new Pengurus,
            'name' => 'PWNU Jawa Barat'
        ];
        return view('pages.pwnu', $data);
    }
}
