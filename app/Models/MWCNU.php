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
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

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


    public static function getListByPcnu($id_pc)
    {
        $model = self::query()->select([
            'mwcnu.id',
            'mwcnu.nama',
            'mwcnu.alamat',
            'relasi_indikator.nilai_baik',
            'relasi_indikator.nilai_cukup',
            'relasi_indikator.nilai_kurang',
            DB::raw('COUNT(ranting.id) as jumlah'),
            DB::raw('(SELECT COUNT(*) FROM wilayah w WHERE LEFT(w.kode, 8) = mwcnu.kecamatan AND LENGTH(w.kode) = 13) as actual_ranting')
        ])
        ->leftJoin('ranting', 'mwcnu.id', '=', 'ranting.id_mwcnu')
        ->leftJoin('relasi_indikator', 'mwcnu.id', '=', 'relasi_indikator.id_mwcnu')
        ->where('mwcnu.id_pcnu', $id_pc)
        ->groupBy(['mwcnu.id', 'mwcnu.nama', 'mwcnu.alamat']);

        return DataTables::eloquent($model)
        ->addIndexColumn()
        ->editColumn('id', function($row) {
            return setRoute(strval($row->id));
        })
        // ->addColumn('column_name', function($row) {
        // })
        ->make(true);
    }

    public static function detailMwcnu($id){
        $query = self::query()
        ->select([
            'mwcnu.id_pcnu',
            'mwcnu.id',
            'mwcnu.nama',
            'mwcnu.alamat',
            'mwcnu.telp',
            'mwcnu.email',
            'mwcnu.website',
            'mwcnu.lat',
            'mwcnu.long',
            'mwcnu.provinsi',
            'mwcnu.kota',
            'mwcnu.kecamatan',
            DB::raw('COUNT(ranting.id) as jumlah'),
            DB::raw('(SELECT COUNT(*) FROM wilayah w WHERE LEFT(w.kode, 8) = mwcnu.kecamatan AND LENGTH(w.kode) = 13) as actual_ranting')
        ])
        ->leftJoin('ranting', 'mwcnu.id', '=', 'ranting.id_mwcnu')
        ->groupBy(['mwcnu.id', 'mwcnu.nama', 'mwcnu.alamat'])
        ->where('mwcnu.id', $id)
        ->first();

        return $query;
    }

    public static function getRowData($id)
    {
        return self::query()
            ->select(['id', 'kota', 'kecamatan', 'nama'])
            ->where('id', $id)
            ->first();
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
