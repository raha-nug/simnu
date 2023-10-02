<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPengurus extends Model
{
    use HasFactory;
    protected $table = 'jenis_pengurus';
    protected $guarded = 'id';
    protected $fillable = [
        'nama_jp'
    ];
}
