<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyusutan extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'penyusutan';
    protected $primaryKey = 'id_penyusutan';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'id_penyusutan',
        'id_aset',
        'biaya_perolehan',
        'nilai_residu',
        'umur_manfaat',
        'biaya_perolehanDep'
    ];

    public function aset()
    {
        return $this->belongsTo(Aset::class, 'id_aset', 'id_aset');
    }
    

}
