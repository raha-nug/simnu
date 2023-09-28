<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WilayahModel extends Model
{
    use HasFactory;
    protected $table = "wilayah";
    protected $primaryKey = 'kode';
    protected $keyType = 'string';
    protected $guarded = 'kode';
    protected $fillable = [];

    public function getAddress(string $kode)
    {
        $data = $this->query();
        switch (strlen($kode)) {
            case 2:
                $data->whereRaw(sprintf("LEFT(kode,2) = '%s' AND LENGTH(kode) = 5", $kode));
                break;
            case 5:
                $data->whereRaw(sprintf("LEFT(kode,5) = '%s' AND LENGTH(kode) = 8", $kode));
                break;
            case 8:
                $data->whereRaw(sprintf("LEFT(kode,8) = '%s' AND LENGTH(kode) = 13", $kode));
                break;
            case 13:
                $data->where('kode', $kode);
                break;

            default:
                break;
        }

        return $data->get();
    }

    public function getSingleAddress(string $kode)
    {
        return $this->query()->where('kode', $kode)->first();
    }
}
