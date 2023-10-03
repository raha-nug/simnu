<?php

namespace App\Models;

use App\Models\Ranting;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AnakRanting extends Model
{
    use HasFactory,HasUuids;
    protected $table = "anak_ranting";
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    protected $guarded = 'id';
    protected $fillable = [
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

    public static function getListByRanting($id_ranting, $limit, $start, $search = null)
    {
        if (!$id_ranting)
            return [];

        $query = self::query()
            ->where('id_ranting', $id_ranting)
            // ->paginate($paginate);
            ->limit($limit)
            ->offset($start);
        if ($search) {
            $query->whereRaw("anak_ranting.nama LIKE '%{$search}%'")
            ->orWhereRaw("anak_ranting.alamat LIKE '%{$search}%'");
        }

        return $query->get();
    }

    public function ranting(): BelongsTo
    {
        return $this->belongsTo(Ranting::class);
    }
}
