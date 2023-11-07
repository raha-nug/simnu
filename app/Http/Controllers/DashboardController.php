<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'username' => session()->get('nama_user'),
            'from' => 'Jawa Barat',
        ];

        return view('pages.dashboard',$data);
    }
}
