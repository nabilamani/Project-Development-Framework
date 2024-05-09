<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aset extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'aset';
    protected $primaryKey = 'id_aset';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'id_aset',
        'nama_aset',
        'kategori',
        'kondisi',
        'status',
        'lokasi',
        'nilai',
        'tahun_perolehan',
        'deskripsi',
        'gambar'
    ];

    public function penytusutan()
    {
        return $this->belongsTo(Penyusutan::class, 'id_aset', 'id_aset');
    }

}
