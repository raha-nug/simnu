<?php

namespace App\Models;

use App\Models\MWCNU;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ranting extends Model
{
    use HasFactory,HasUuids;
    protected $table = "ranting";
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    protected $guarded = 'id';
    protected $fillable = [
        'id_mwcnu',
        'nama',
        'alamat',
        'telp',
        'email',
        'website',
        'lat',
        'long',
        'provinsi',
        'kota',
        'kecamatan',
        'desa'
    ];

    public function mwcnu(): BelongsTo
    {
        return $this->belongsTo(MWCNU::class);
    }
}
