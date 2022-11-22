<?php

namespace App\Models;

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

}