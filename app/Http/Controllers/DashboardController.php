<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() 
    {
        $data = [
            'title' => 'Dashboard',
            'username' => 'John Doe',
            'from' => 'Jawa Barat',
        ];

        return view('pages.dashboard',$data);
    }
}
