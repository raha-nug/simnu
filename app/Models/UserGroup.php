<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserGroup extends Model
{
    use HasFactory;
    protected $table = 'user_group';
    protected $guarded = 'id';
    protected $fillable = [
        'nama_user_group',
        'deskripsi_user_group',
        'super_admin'
    ];
}
