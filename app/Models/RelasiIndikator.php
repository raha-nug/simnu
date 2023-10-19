<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RelasiIndikator extends Model
{
    use HasFactory, HasUuids;
    protected $table = "relasi_indikator";
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    protected $guarded = 'id';
    protected $fillable = [
        'id_pwnu',
        'id_pcnu',
        'id_mwcnu',
        'id_indikator',
        'nilai'
    ];

}
