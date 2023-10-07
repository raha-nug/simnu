<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCredentials extends Model
{
    use HasFactory;
    protected $table = 'table_user_credentials';
    protected $guarded = 'id';
    protected $fillable = [
        'id_grup',
        'can_update',
        'can_create',
        'can_delete',
        'can_manage_user'
    ];

    public function user_groups()
    {
        return $this->belongsTo(UserGroup::class);
    }
}
