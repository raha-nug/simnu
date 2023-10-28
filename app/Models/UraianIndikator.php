<?php

namespace App\Models;

use App\Models\Indikator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UraianIndikator extends Model
{
    use HasFactory;

    protected $table = 'uraian_indikator';
    protected $guarded = 'id';
    protected $fillable = [
        'nama_uraian',
        'id_indikator'
    ];

    protected function indikator() :BelongsTo {
        return $this->belongsTo(Indikator::class);
    }
}
