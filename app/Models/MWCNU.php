<?php

namespace App\Models;

use App\Models\PCNU;
use App\Models\Banom;
use App\Models\Lembaga;
use App\Models\SuratKeputusan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MWCNU extends Model
{
    use HasFactory;
    protected $table = "mwcnu";
    protected $guarded = 'id';
    protected $fillable = [
        'id_pcnu',
        'nama',
        'alamat',
        'telp',
        'email',
        'website',
        'lat',
        'long',
        'provinsi',
        'kota',
        'kecamatan'
    ];


    public static function getListByPcnu($id_pc, $paginate)
    {
        if (!$id_pc)
            return [];

        $query = self::query()
            ->select(['mwcnu.id', 'mwcnu.nama', 'mwcnu.alamat'])
            ->selectRaw('COUNT(ranting.id) as jumlah_ranting')
            ->leftJoin('ranting', 'mwcnu.id', '=', 'id_mwcnu')
            ->where('id_pcnu', $id_pc)
            ->groupBy(['mwcnu.id', 'mwcnu.nama', 'mwcnu.alamat'])
            ->paginate($paginate);
        // ->get();

        return $query;
    }

    public function pcnu(): BelongsTo
    {
        return $this->belongsTo(PCNU::class);
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
