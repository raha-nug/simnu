<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterLembaga extends Model
{
    use HasFactory;
    protected $table = 'master_lembaga';
    protected $guarded = 'id';
    protected $fillable = [
        'nama_lembaga'
    ];
}
