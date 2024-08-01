<?php

namespace App\Models;

use App\Models\SuratKeputusan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;

class Pengurus extends Model
{
    use HasFactory,HasUuids;
    protected $table = "pengurus";
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    protected $guarded = 'id';
    protected $fillable = [
        'id_sk',
        'id_anggota',
        'nik',
        'nama',
        'jabatan',
        'mulai_jabatan',
        'akhir_jabatan',
        'jenis_pengurus'
    ];

    public static function setValue(array $data, string $anggota_id): array 
    {
        $pengurus = DB::table('surat_keputusan')
            ->select('tanggal_mulai', 'tanggal_berakhir')
            ->where('id', $data['id_sk'])
            ->first();

        return array_merge($data, ['id_anggota' => $anggota_id,'mulai_jabatan' => $pengurus->tanggal_mulai, 'akhir_jabatan' => $pengurus->tanggal_berakhir]);
    }

    public function sk(): BelongsTo
    {
        return $this->belongsTo(SuratKeputusan::class);
    }
}
