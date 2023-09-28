<?php

namespace App\Models;

use App\Models\PWNU;
use App\Models\Banom;
use App\Models\Lembaga;
use App\Models\SuratKeputusan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PCNU extends Model
{
    use HasFactory;
    protected $table = "pcnu";
    protected $guarded = 'id';
    protected $fillable = [
        'id_pwnu',
        'nama',
        'alamat',
        'telp',
        'email',
        'website',
        'lat',
        'long',
        'provinsi',
        'kota'
    ];

    public static function getData($paginate)
    {
        $query = self::query()
            ->select(['pcnu.id', 'pcnu.nama', 'pcnu.alamat'])
            ->selectRaw('COUNT(mwcnu.id) as jumlah_mwc')
            ->leftJoin('mwcnu', 'pcnu.id', '=', 'mwcnu.id_pcnu')
            ->groupBy('pcnu.id')
            ->paginate($paginate);
        // ->get();

        return $query;
    }

    public function pwnu(): BelongsTo
    {
        return $this->belongsTo(PWNU::class);
    }

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
