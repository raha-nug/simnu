<?php

namespace App\Imports;

use App\Models\MWCNU;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class DataMwcnu implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach($collection as $row) {
            return new PCNU([
                'id_pwnu' => 1,
                'nama' => $row[1],
                'alamat' => $row[2],
                'telp' => $row[3],
                'email' => $row[4],
                'website' => $row[5],
                'lat' => $row[12],
                'long' => $row[13],
                'provinsi' => 32,
                'kota' => $row[6],
            ]);
        }
    }
}
