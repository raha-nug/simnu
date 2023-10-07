<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BanomBasis extends Model
{
    use HasFactory;
    protected $table = 'banom_basis';
    protected $guarded = 'id';
    protected $fillable = [
        'nama_banom_basis'
    ];
}
