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

    public static function getListByMwcnu($id_mwcnu, $limit, $start, $search = null)
    {
        if (!$id_mwcnu)
            return [];

        $query = self::query()
            ->select(['ranting.id', 'ranting.nama', 'ranting.alamat'])
            ->selectRaw('COUNT(anak_ranting.id) as jumlah')
            ->leftJoin('anak_ranting', 'ranting.id', '=', 'id_ranting')
            ->where('id_mwcnu', $id_mwcnu)
            ->groupBy(['ranting.id', 'ranting.nama', 'ranting.alamat'])
            // ->paginate($paginate);
            ->limit($limit)
            ->offset($start);
        if ($search) {
            $query->whereRaw("ranting.nama LIKE '%{$search}%'")
            ->orWhereRaw("ranting.alamat LIKE '%{$search}%'");
        }

        return $query->get();
    }

    public function mwcnu(): BelongsTo
    {
        return $this->belongsTo(MWCNU::class);
    }
}
