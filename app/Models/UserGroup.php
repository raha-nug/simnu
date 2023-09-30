<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserGroup extends Model
{
    use HasFactory;
    protected $table = 'table_user_groups';
    protected $guarded = 'id';
    protected $fillable = [
        'nama_grup',
        'id_pwnu',
        'id_pcnu',
        'id_mwcnu',
        'id_rantingnu'
    ];

    public function pcnu()
    {
        return $this->belongsTo(PCNU::class);
    }
}
