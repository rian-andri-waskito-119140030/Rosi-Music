<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;
    protected $table = 'pembayaran';
    protected $primaryKey = 'id_pembayaran';
    public $incrementing = false;
    
    protected $fillable = [
        'id_pembayaran',
        'id_transaksi',
        'uang_bayar',
        'waktu_bayar',
        'status_pembayaran'
    ];
}