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
        'nama_group',
        'id_pwnu',
        'id_pcnu',
        'id_mwcnu',
        'id_rantingnu'
    ];
}
