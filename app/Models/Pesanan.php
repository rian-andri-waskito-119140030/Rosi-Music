<?php

namespace App\Models;
use App\Models\Paket;

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
        'id_pelanggan',
        'id_paket',
        'tanggal_booking',
        'tanggal_selesai',
        'no_hp',
        'alamat',
        'catatan',
        'status',
    ];

    public function paket()
    {
        return $this->belongsTo(Paket::class, 'id_paket');
    }
}