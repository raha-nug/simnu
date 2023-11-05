<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indikator extends Model
{
    use HasFactory;
    protected $table = 'indikator';
    protected $guarded = 'id';
    protected $fillable = [
        'nama_indikator',
        'tingkat_indikator'
    ];
}
