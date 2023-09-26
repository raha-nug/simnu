<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory,HasUuids;
    protected $table = 'user';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    protected $guarded = 'id';
    protected $fillable = [
        'email',
        'password',
        'id_user_group',
        'id_pcnu',
        'id_mwcnu',
        'id_lembaga',
        'id_banom',
        'id_ranting',
        'id_anak_ranting'
    ];
}
