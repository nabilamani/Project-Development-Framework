<?php

// Namespace untuk model
namespace App\Models;

// Menggunakan class yang diperlukan
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Mendefinisikan class Pemeliharaan yang merupakan subclass dari Model
class Pemeliharaan extends Model
{
    // Menggunakan trait HasFactory
    use HasFactory;

    // Menonaktifkan timestamps (created_at dan updated_at)
    public $timestamps = false;

    // Mendefinisikan nama tabel yang digunakan
    protected $table = 'pemeliharaan';

    // Mendefinisikan primary key tabel
    protected $primaryKey = 'id_pemeliharaan';

    // Menonaktifkan incrementing untuk primary key
    public $incrementing = false;

    // Mendefinisikan tipe data primary key
    protected $keyType = 'string';

    // Mendefinisikan kolom yang dapat diisi
    protected $fillable = [
        'id_pemeliharaan',
        'id_aset',
        'biaya_pemeliharaan',
        'tanggal_pemeliharaan',
        'keterangan'
    ];

    // Mendefinisikan relasi dengan model Aset
    public function aset()
    {
        // Relasi belongsTo ke model Aset
        return $this->belongsTo(Aset::class, 'id_aset', 'id_aset');
    }
}

?>
