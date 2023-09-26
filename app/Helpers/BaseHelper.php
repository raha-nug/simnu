<?php

namespace App\Helpers;

class BaseHelper 
{
   private $chiper_algo = "aes-192-cbc";
   private $key = "@cmr-2022";
   private $iv;

   
   public function __construct()
   {
      $this->iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($this->chiper_algo));
   }

   public function setRoute(string $slug) :string
   {
      return openssl_encrypt($slug, $this->chiper_algo, $this->key, 0, $this->iv);
   }

   public function getRoute(string $slug) :string 
   {
      return openssl_decrypt($slug, $this->chiper_algo, $this->key, 0, $this->iv);
   }
   
}

