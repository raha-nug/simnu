<?php

namespace App\Models;

use App\Models\Banom;
use App\Models\Lembaga;
use App\Models\SuratKeputusan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PWNU extends Model
{
    use HasFactory;
    protected $table = "pwnu";
    protected $guarded = 'id';
    protected $fillable = [
        'nama',
        'alamat',
        'telp',
        'email',
        'website',
        'lat',
        'long',
        'provinsi'
    ];

    public function lembaga(): HasMany
    {
        return $this->hasMany(Lembaga::class);
    }

    public function banom(): HasMany
    {
        return $this->hasMany(Banom::class);
    }

    public function surat_keputusan(): HasMany
    {
        return $this->hasMany(SuratKeputusan::class);
    }
}
