<?php

namespace App\Http\Controllers;

use App\Models\WilayahModel;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;


    protected $wilayah;
    
    public function __construct()
    {
        $this->wilayah = new WilayahModel();
    }
    
    public function getSingleAddress(Request $request)
    {
        $kode = $request->kode;
        $data = $this->wilayah->getSingleAddress($kode);
        return response()->json(['success' => 1, 'data' => $data]);
    }
}
