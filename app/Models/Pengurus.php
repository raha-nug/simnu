<?php

namespace App\Models;

use App\Models\SuratKeputusan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengurus extends Model
{
    use HasFactory,HasUuids;
    protected $table = "pengurus";
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    protected $guarded = 'id';
    protected $fillable = [
        'id_sk',
        'nik',
        'nama',
        'jabatan',
        'mulai_jabatan',
        'akhir_jabatan',
    ];

    public function sk(): BelongsTo
    {
        return $this->belongsTo(SuratKeputusan::class);
    }
}
