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
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    protected $guarded = 'id';
    protected $fillable = [
        'id_pwnu',
        'id_pcnu',
        'id_mwcnu',
        'id_banom',
        'id_lembaga',
        'id_ranting',
        'id_anak_ranting',
        'no_dokumen',
        'tanggal_mulai',
        'tanggal_berakhir',
        'file_sk',
    ];

    public static function getSklist($limit, $start, $options)
    {
        $query = self::query();
        switch ($options) {
            case !empty($options['id_pwnu']):
                $query->where('id_pwnu', $options['id_pwnu']);
                break;
            case !empty($options['id_pcnu']):
                $query->where('id_pcnu', $options['id_pcnu']);
                break;
            case !empty($options['id_mwcnu']):
                $query->where('id_mwcnu', $options['id_mwcnu']);
                break;
            case !empty($options['id_lembaga']):
                $query->where('id_lembaga', $options['id_lembaga']);
                break;
            case !empty($options['id_banom']):
                $query->where('id_banom', $options['id_banom']);
                break;

            default:
                break;
        }
        if($options['search']) {
            $query->whereRaw("nama LIKE '%{$options['search']}%'");
        }

        return $query->limit($limit)
            ->offset($start)
            ->get();
    }

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
