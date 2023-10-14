<?php

namespace App\Http\Controllers;

use App\Models\PWNU;
use Illuminate\Http\Request;
use App\Models\SuratKeputusan;

class PwnuController extends Controller
{
    public function index()
    {
        $pw_detail = PWNU::query()->where('id', 1)->first();
        $sk = SuratKeputusan::query()->where('id_pwnu', $pw_detail->id)->get();
        $data = [
            'title' => 'PWNU',
            'pw_detail' => $pw_detail,
            'username' => 'John Doe',
            'from' => 'Jawa Barat',
            'nomor' => $count = 1,
            'sk' => $sk,
            'name' => 'PWNU Jawa Barat'
        ];
        return view('pages.pwnu', $data);
    }
}
