<?php

namespace App\Models;

use App\Models\Ranting;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AnakRanting extends Model
{
    use HasFactory;
    protected $table = "anak_ranting";
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    protected $guarded = 'id';
    protected $fillbale = [
        'id_ranting',
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

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->{$model->getKeyName()} = Str::uuid()->toString();
        });
    }

    public function ranting(): BelongsTo
    {
        return $this->belongsTo(Ranting::class);
    }
}
