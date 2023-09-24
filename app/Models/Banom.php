<?php

namespace App\Models;

use App\Models\PCNU;
use App\Models\PWNU;
use App\Models\MWCNU;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Banom extends Model
{
    use HasFactory;
    protected $table = "banom";
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    protected $guarded = 'id';
    protected $fillbale = [
        'id_pwnu',
        'id_pcnu',
        'id_mwcnu',
        'nama',
        'alamat',
        'telp',
        'provinsi',
        'kota',
        'kecamatan',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->{$model->getKeyName()} = Str::uuid()->toString();
        });
    }

    public function mwcnu(): BelongsTo
    {
        return $this->belongsTo(MWCNU::class);
    }

    public function pcnu(): BelongsTo
    {
        return $this->belongsTo(PCNU::class);
    }

    public function pwnu(): BelongsTo
    {
        return $this->belongsTo(PWNU::class);
    }
}
