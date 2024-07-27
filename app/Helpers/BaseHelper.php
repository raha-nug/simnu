<?php

use Carbon\Carbon;
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
      Carbon::setlocale('id');
      $result = collect([]);
      foreach ($collection as $item) {
         $val = [
            "id" => setRoute($item->id),
            "nama" => $item->nama,
            'no_dokumen' => $item->no_dokumen,
            'tanggal_mulai' => Carbon::parse($item->tanggal_mulai)->translatedFormat('d F Y'),
            'tanggal_berakhir' => Carbon::parse($item->tanggal_berakhir)->translatedFormat('d F Y'),
            "alamat" =>  $item->nama,
            "jumlah" =>  $item->jumlah,
            "nilai_baik" => $item->nilai_baik,
            "nilai_cukup" => $item->nilai_cukup,
            "nilai_kurang" => $item->nilai_kurang,
            "nama" => $item->nama,
            "jabatan" => $item->jabatan,
            "pengurus" => $item->jenis_pengurus,
            "mulai_jabatan" => Carbon::parse($item->mulai_jabatan)->translatedFormat('d F Y'),
            "akhir_jabatan" => Carbon::parse($item->akhir_jabatan)->translatedFormat('d F Y'),
         ];
         $result->push($val);
      }
      $result->escapeWhenCastingToString(false);
      return $result;
   }
}
