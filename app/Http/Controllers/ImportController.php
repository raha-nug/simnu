<?php

namespace App\Http\Controllers;

use App\Models\PCNU;
use App\Models\MWCNU;
use App\Imports\DataMwcnu;
use Illuminate\Http\Request;
use App\Models\MasterLembaga;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    public function import()
    {
        try {
            //code...
            $filePath = public_path('nu_sub_districts_202312191601.csv');
            if (file_exists($filePath)) {
                $data = array_map('str_getcsv', file($filePath));
                // dd($data);
                // Skip the header row if it exists
                $header = array_shift($data);
                foreach ($data as $row) {
                    if(!isset($row[6])){
                        continue;
                    }
                    $kota = "32.". substr($row[6],2,2);
                    $kecamatan = $kota . "." . substr($row[6],4,2);

                    $pcnu = PCNU::where('kota', $kota)->first();
                    if(!$pcnu){
                        continue;
                    }
                    // PCNU::create([
                    //     'id' => $row[0],
                    //     'nama' => $row[1],
                    //     'alamat' => $row[2],
                    //     'telp' => $row[3],
                    //     'email' => $row[4],
                    //     'website' => $row[5],
                    //     'id_pwnu' => 1,
                    //     'lat' => $row[12],
                    //     'kota' => $kota,
                    //     'provinsi' => 32,
                    //     'long' => $row[13],
                    // ]);
                    MWCNU::create([
                        'id_pcnu' => $pcnu->id,
                        'nama' => $row[1],
                        'alamat' => $row[2],
                        'telp' => $row[3],
                        'email' => $row[4],
                        'website' => $row[5],
                        'lat' => $row[12],
                        'long' => $row[13],
                        'provinsi' => 32,
                        'kota' => $kota,
                        'kecamatan' => $kecamatan,
                    ]);
                }

                dd("Success");
            }

        } catch (\Throwable $th) {
            dd($th);
        }

    }
}
