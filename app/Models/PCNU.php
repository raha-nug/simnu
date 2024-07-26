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
use Illuminate\Support\Facades\DB;

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

    public static function getData()
    {
        $query = self::query()
        ->select([
            'pcnu.id', 
            'pcnu.nama', 
            'pcnu.alamat', 
            'relasi_indikator.nilai_kurang',
            'relasi_indikator.nilai_cukup', 
            'relasi_indikator.nilai_baik',
            DB::raw('COUNT(mwcnu.id) as jumlah_mwc'),
            DB::raw('(SELECT COUNT(*) FROM wilayah w WHERE LEFT(w.kode, 5) = pcnu.kota AND LENGTH(w.kode) = 8) as actual_mwc')
        ])
        ->leftJoin('mwcnu', 'pcnu.id', '=', 'mwcnu.id_pcnu')
        ->leftJoin('relasi_indikator', 'pcnu.id', '=', 'relasi_indikator.id_pcnu')
        ->groupBy(['pcnu.id', 'pcnu.nama', 'pcnu.alamat'])
        ->get();

        return $query;
    }

    public static function getRowData($id)
    {
        return self::query()
            ->select(['id', 'kota'])
            ->where('id',$id)
            ->first();
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
