<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemeliharaan extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'pemeliharaan';
    protected $primaryKey = 'id_pemeliharaan';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'id_pemeliharaan',
        'id_aset',
        'biaya_pemeliharaan',
        'tanggal_pemeliharaan',
        'keterangan'
    ];

    public function aset()
    {
        return $this->belongsTo(Aset::class, 'id_aset', 'id_aset');
    }
    

}

?>