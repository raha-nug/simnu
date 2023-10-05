<?php

namespace App\Models;

use App\Models\BanomBasis;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MasterBanom extends Model
{
    use HasFactory;
    protected $table = 'master_banom';
    protected $guarded = 'id';
    protected $fillable = [
        'id_banom_basis',
        'nama_banom'
    ];

    public function banom_basis() : BelongsTo
    {
        return $this->belongsTo(BanomBasis::class);
    }
}
