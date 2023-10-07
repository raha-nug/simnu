<?php

namespace App\Models;

use App\Models\Users;
use App\Models\UserGroup;
use Illuminate\Support\Facades\Hash;
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
        'id_grup'
    ];

    protected static function boot(){
        parent::boot();

        static::creating( function($users){
            $users->password = Hash::make($users->password);
        });

        static::updating( function(Users $users){
            if($users->isDirty(["password"])){
                $users->password = Hash::make($users->password);
            }
        });
    }

    public function userGroup(): BelongsTo
    {
        return $this->belongsTo(UserGroup::class);
    }
}
