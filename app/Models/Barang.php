<?php

namespace App\Models;

use App\Models\Jenis_Barang;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $table = 'barang';
    protected $primaryKey = 'id_barang';
    public $incrementing = false;
    
    protected $fillable = [
        'id_barang',
        'gambar',
        'nama_barang',
        'id_jenis_barang',
        'kondisi',
    ];

    public function jenis_barang()
    {
        return $this->belongsTo(Jenis_Barang::class, 'id_jenis_barang');
    }
}