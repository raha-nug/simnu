<?php

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Crypt;

if (!function_exists('setRoute')) {
   function setRoute(string $slug): string
   {
        return Crypt::encryptString($slug);
   }
}

if (!function_exists('getRoute')) {
   function getRoute(string $slug): string
   {
        return Crypt::decryptString($slug);
   }
}

if (!function_exists('mapSetRoute')) {
   function mapSetRoute(Collection $collection): Collection
   {
      $result = collect([]);
      foreach ($collection as $item) {
         $val = [
            "id" => setRoute($item->id),
            "nama" => $item->nama,
            'no_dokumen' => $item->no_dokumen,
            'tanggal_mulai' => $item->tanggal_mulai,
            'tanggal_berakhir' => $item->tanggal_berakhir,
            "alamat" =>  $item->nama,
            "jumlah" =>  $item->jumlah,
            "nilai_baik" => $item->nilai_baik,
            "nilai_cukup" => $item->nilai_cukup,
            "nilai_kurang" => $item->nilai_kurang,
            "nama" => $item->nama,
            "jabatan" => $item->jabatan,
            "pengurus" => $item->jenis_pengurus,
            "mulai_jabatan" => $item->mulai_jabatan,
            "akhir_jabatan" => $item->akhir_jabatan,
         ];
         $result->push($val);
      }
      $result->escapeWhenCastingToString(false);
      return $result;
   }
}
