<?php

namespace App\Models;
use App\Models\Paket;
use App\Models\Jenis_Barang;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang_Dipaket extends Model
{
    use HasFactory;
    protected $table = 'barang_dipaket';
    public $incrementing = false;
    
    protected $fillable = [
        'id_paket',
        'id_jenis_barang',
        'jumlah',
    ];

    public function paket()
    {
        return $this->belongsTo(Paket::class, 'id_paket');
    }

    public function jenis_barang()
    {
        return $this->belongsTo(Jenis_Barang::class, 'id_jenis_barang');
    }
}