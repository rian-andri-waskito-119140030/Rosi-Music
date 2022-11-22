<?php

namespace App\Models;

use App\Models\Pesanan;
use App\Models\Jenis_Paket;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    use HasFactory;
    protected $table = 'paket';
    protected $primaryKey = 'id_paket';
    public $incrementing = false;

    protected $fillable = [
        'id_paket',
        'id_jenis_paket',
        'nama_paket',
        'gambar',
        'harga_sewa',
        'deskripsi_singkat',
        'deskripsi_panjang',
    ];

    public function jenis_paket()
    {
        return $this->belongsTo(Jenis_Paket::class, 'id_jenis_paket');
    }

    public function pesanan()
    {
        return $this->hasMany(Pesanan::class, 'id_paket');
    }
}