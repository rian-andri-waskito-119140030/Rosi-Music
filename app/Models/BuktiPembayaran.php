<?php

namespace App\Models;
use App\Models\Transaksi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuktiPembayaran extends Model
{
    use HasFactory;
    protected $table = 'bukti_pembayaran';
    protected $primaryKey = 'id_bukti_pembayaran';
    public $incrementing = false;
    
    protected $fillable = [
        'id_bukti_pembayaran',
        'id_transaksi',
        'bukti',
        'nominal',
        'status_pembayaran'
    ];

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'id_transaksi');
    }
}