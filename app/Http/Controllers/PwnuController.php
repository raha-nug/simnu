<?php

namespace App\Http\Controllers;

use App\Models\PWNU;
use Illuminate\Http\Request;

class PwnuController extends Controller
{
    public function index()
    {
        $pw_detail = PWNU::query()->where('id', 1)->first();
        $data = [
            'title' => 'PWNU',
            'pw_detail' => $pw_detail,
            'username' => 'John Doe',
            'from' => 'Jawa Barat',
            'name' => 'PWNU Jawa Barat'
        ];
        return view('pages.pwnu', $data);
    }
}
