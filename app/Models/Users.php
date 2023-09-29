<?php

namespace App\Models;

use App\Models\UserGroup;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Users extends Model
{
    use HasFactory;
    protected $table = 'table_users';
    protected $guarded = 'id';
    protected $fillable = [
        'nama',
        'email',
        'password',
        'no_telp',
        'nik',
        'provinsi',
        'kota',
        'kecamatan',
        'desa',
        'is_whatsapp',
        'id_group'
    ];

    public function userGroup(): BelongsTo
    {
        return $this->belongsTo(UserGroup::class);
    }
}
