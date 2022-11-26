<?php

namespace App\Models;
use App\Models\Hutang;
use App\Models\Pesanan;
use App\Models\BuktiPembayaran;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi';
    public $incrementing = false;
    
    protected $fillable = [
        'id_transaksi',
        'id_pesanan',
        'total_bayar',
        'waktu_transaksi',
        'status_transaksi',
    ];

    public function hutang()
    {
        return $this->hasOne(Hutang::class, 'id_transaksi');
    }

    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class, 'id_pesanan');
    }

    public function bukti_pembayaran()
    {
        return $this->hasMany(BuktiPembayaran::class, 'id_transaksi');
    }
}