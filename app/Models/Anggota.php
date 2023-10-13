<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Anggota extends Model
{
    use HasFactory,HasUuids;
    protected $table = "anggota";
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    protected $guarded = 'id';
    protected $fillable = [
        'nik',
        'nama',
        'karta_nu',
        'no_telp',
        'email',
        'alamay',
        'provinsi',
        'kab',
        'kec',
        'desa',
        'img'
    ];
}
