<?php

namespace App\Models;
use App\Models\Paket;
use App\Models\PesananSistem;
use App\Models\PesananWA;
use App\Models\CatatanPenolakan;
use App\Models\Transaksi;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;
    protected $table = 'pesanan';
    protected $primaryKey = 'id_pesanan';
    public $incrementing = false;
    
    protected $fillable = [
        'id_pesanan',
        'id_paket',
        'tanggal_booking',
        'tanggal_selesai',
        'no_hp',
        'alamat',
    ];

    public function paket()
    {
        return $this->belongsTo(Paket::class, 'id_paket');
    }

    public function pesanan_sistem()
    {
        return $this->hasOne(PesananSistem::class, 'id_pesanan');
    }

    public function pesanan_wa()
    {
        return $this->hasOne(PesananWA::class, 'id_pesanan');
    }

    public function catatan_penolakan()
    {
        return $this->hasOne(CatatanPenolakan::class, 'id_pesanan');
    }

    public function transaksi()
    {
        return $this->hasOne(Transaksi::class, 'id_pesanan');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id_pelanggan');
    }
}