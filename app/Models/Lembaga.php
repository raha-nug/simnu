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

class Lembaga extends Model
{
    use HasFactory,HasUuids;
    protected $table = "lembaga";
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    protected $guarded = 'id';
    protected $fillable = [
        'id_pwnu',
        'id_pcnu',
        'id_mwcnu',
        'nama',
        'alamat',
        'telp',
        'provinsi',
        'kota',
        'kecamatan',
    ];

    public static function getReferenceData($id)
    {
        return self::query()
            ->select(['id_pwnu', 'id_pcnu', 'id_mwcnu'])
            ->where('id', $id)
            ->first();
    }

    public static function getLembagalist($limit, $start, $options)
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
