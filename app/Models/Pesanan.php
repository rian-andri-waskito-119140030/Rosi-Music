<?php

namespace App\Models;
use App\Models\Paket;
use App\Models\CatatanPenolakan;

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

    public function catatan_penolakan()
    {
        return $this->hasOne(CatatanPenolakan::class, 'id_pesanan');
    }
}