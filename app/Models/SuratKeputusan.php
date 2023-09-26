<?php

namespace App\Models;

use App\Models\PCNU;
use App\Models\PWNU;
use App\Models\MWCNU;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SuratKeputusan extends Model
{
    use HasFactory,HasUuids;
    protected $table = "surat_keputusan";
    protected $primaryKey = 'sk_id';
    protected $keyType = 'string';
    protected $guarded = 'sk_id';
    protected $fillable = [
        'id_pwnu',
        'id_pcnu',
        'id_mwcnu',
        'tanggal_mulai',
        'tanggal_berakhir',
        'file_sk',
    ];

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
