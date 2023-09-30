<?php

if (!function_exists('setRoute')) {
   function setRoute(string $slug) : string
   {
      $chiper_algo = "aes-192-cbc";
      $key = "@cmr-2022";
      $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($chiper_algo));
      $encoded_str = openssl_encrypt($slug, $chiper_algo, $key, OPENSSL_RAW_DATA, $iv);
      return rawurlencode(base64_encode($iv.$encoded_str));
   }
}

if (!function_exists('getRoute')) {
   function getRoute(string $slug) : string
   {
      $chiper_algo = "aes-192-cbc";
      $key = "@cmr-2022";
      $base64_str = rawurldecode(base64_decode($slug));
      try {
         $result = openssl_decrypt(substr($base64_str, 16), $chiper_algo, $key, OPENSSL_RAW_DATA, substr($base64_str, 0, 16));
         return $result;
         //code...
      } catch (\Throwable $th) {
         dd($th->getMessage(), $base64_str, $slug);
      }
   }
}

