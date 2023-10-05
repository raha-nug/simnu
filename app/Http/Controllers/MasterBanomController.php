<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MasterBanomController extends Controller
{
    public function index() {
        $data = [
            'title'=> 'Master Banom',
            'username'=>'John Doe',
            'from'=>'Jawa Barat',
        ];

        return view('pages.master-banom', $data);
    }
}
