<?php

namespace App\Models;

use App\Models\MWCNU;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

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

    public static function getListByMwcnu($id_mwcnu)
    {
        $model = self::query()
            ->select(['ranting.id',
             'ranting.nama',
             'ranting.alamat',
             DB::raw('COUNT(anak_ranting.id) as jumlah')])
            ->leftJoin('anak_ranting', 'ranting.id', '=', 'id_ranting')
            ->where('id_mwcnu', $id_mwcnu)
            ->groupBy(['ranting.id', 'ranting.nama', 'ranting.alamat']);

        return DataTables::eloquent($model)
            ->addIndexColumn()
            ->editColumn('id', function($row) {
                return setRoute(strval($row->id));
            })
            // ->addColumn('column_name', function($row) {
            // })
            ->make(true);
    }

    public static function getRowData($id)
    {
        return self::query()
            ->select(['id', 'kota', 'kecamatan','desa'])
            ->where('id', $id)
            ->first();
    }

    public function mwcnu(): BelongsTo
    {
        return $this->belongsTo(MWCNU::class);
    }
}
